import soco
import subprocess
import os
import time
import smtplib
import socket
from datetime import datetime

hostname=socket.gethostname()

def log_resonses(response):
    now=datetime.now()
    dt_string = now.strftime("%d/%m/%Y %H:%M:%S")
    f=open('c:\\temp\\sonoslogfile.txt', 'a') 
    f.write(dt_string+': '+response+'\n')
    f.close()

def error_handler(e):
    response="Program has experienced an error on {} due to: {}".format(hostname, e)
    send_email(response)

def play_music(state_status, speaker):
    if not state_status == "PLAYING":
        speaker.play()
        play_status = "{} was restarted".format(speaker.player_name)
        send_email(play_status)

def get_status(speaker):
    state_status = speaker.get_current_transport_info()['current_transport_state']
    return state_status

def send_email(response):
    sender='sonos@domain.com'
    receivers=['efmsupport@domain.com']
    now=datetime.now()
    dt_string = now.strftime("%d/%m/%Y %H:%M:%S")
    response = dt_string + ': ' + response
    message="""From: Sonos <sonos@domain.com>
To: Email <email@domain.com>
Subject: Sonos Event


{}
""".format(response)
    smtpObj = smtplib.SMTP(host='mail.domain.com', port='25')
    smtpObj.sendmail(sender, receivers, message)
    log_resonses(response)
    time.sleep(300)
    main()

def discover_speakers():
    speakers = soco.discover()
    if not str(speakers) == "None":
        speaker = speakers.pop()
        return speaker
    else:
        discover_status = "{} cannot discover speaker".format(hostname)
        send_email(discover_status)
    
def wifi_connect():
    os.system(f'''cmd /c "netsh wlan connect name=WifiNetwork"''')
    time.sleep(10)
    wifi_connected()


def wifi_connected():
    wifiConnections = subprocess.check_output(['netsh', 'WLAN', 'show', 'interfaces'])
    data = wifiConnections.decode('utf-8')
    if not "WifiNetwork" in data:
        wifi_connect()

def main():
    try:
        wifi_connected()
        speaker = discover_speakers()
        state_status = get_status(speaker)
        play_music(state_status, speaker)
        time.sleep(300)
        main()
    except Exception as e:
        error_handler(e)
        time.sleep(300)
        main()
    

if __name__ == "__main__":
    main()
    
    #Edited out sensitive information
