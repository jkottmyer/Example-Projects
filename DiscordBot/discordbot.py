import os
import discord
from dotenv import load_dotenv
import datetime
import random

from discord.ext import commands

load_dotenv()

TOKEN = os.getenv('DISCORD_TOKEN') # create token constant with discord token
# GUILD = os.getenv('DISCORD_GUILD') # connect to specific server - only used for client

bot = commands.Bot(command_prefix='!', case_insensitive=True) # assign command prefix - case_insenstive means it does not matter if you capitalize the commands as long as you spell it correctly

@bot.event # When bot connects to server
async def on_ready():
    print(f'Bot: {bot.user.name} has connected to Discord!')
    for guild in bot.guilds: # look for all guilds bot is connected to
        for channel in guild.text_channels: # find every channel in list of text channels on guild
            channelLogFile = open(str(channel) + '.txt', 'a') # opens file in append mode
            channelLogFile.write('Bot online at ' + str(datetime.datetime.now().strftime('%m/%d/%Y, %H:%M:%S')) + ' EST\n')
            channelLogFile.close()


@bot.event # on an event - in this case message on_message
async def on_message(message): # when a message is sent pass in the message
    if str(message.channel).startswith('Direct Message with'): # This line keeps from making a file for direct messages to/from the bot
        return
    else:
        channelLogFile = open(str(message.channel) + '.txt', 'a') # open file that has name of channel that the message was sent in
        channelLogFile.write(str(message.author) + ': ' + message.content + ' @ ' + str(datetime.datetime.now().strftime('%m/%d/%Y, %H:%M:%S')) + ' EST\n') # records the discord tag of the message sender, the message, and the formatted date and time of message
        channelLogFile.close() # closes file
        
    await bot.process_commands(message) # very important - will not allow for commands to execute if not there

@bot.command(name='test') # example of a command 
async def testing(ctx):  
    await ctx.send(f'This is a test to make sure @everyone is working.')

@bot.command(name='fail') # example of a command with a role associated
@commands.has_role('admin') # has role only allows 1 type of role
async def testingRoles(ctx):
    await ctx.send('This will fail unless you are an admin!')

@bot.command(name='print') # example of taking args and repeating them back out
async def printUserInput(ctx, *args):
    response = "" # starts response as an empty string
    for arg in args: # for each arg in args - which is what the user types in
        response = response + " " + arg
    await ctx.send(response)

@bot.command(name='roll') # roll a requested number, up to 5, dice of specified sides
async def rollDice(ctx, quantity, sides):
    try:
        diceQuantity = int(quantity) # if either of these are not numbers/can't be converted to ints, such as letters, this fails and goes to the except message
        diceSides = int(sides)
        diceRollList = [] # instanciate list where rolls with be added to then displayed
        i = 0
        while i < diceQuantity:
            diceRollList.append(random.randint(1, diceSides)) # generates a random number between 1 and the number of sides given
            i += 1
        await ctx.send(diceRollList)
    except:
        await ctx.send('Please enter a valid roll such as !roll 4 20') # catch text being added to a roll
    
@bot.command(name='logs') # send the log file for a channel that is given with command via dm to user as long as they are admin
@commands.has_any_role('admin', 'dev') # has any role allows for multiple roles
async def requestChannelChatLogs(ctx, args):
    try:
        requester = ctx.author # user who requests logs - admin
        requestedFile = './' + str(args) + '.txt' # variable for the file they are requesting
        await requester.create_dm() # create dm with requester
        await requester.dm_channel.send(file=discord.File(requestedFile), content=f'{str(args)} channel log') # send dm with file
    except:
        await requester.create_dm() # create dm with requester
        await requester.dm_channel.send('File does not exist.') # send dm with error message

@bot.event # any time there is an error with command where user is not correct privelage
async def on_command_error(ctx, error):
    if isinstance(error, commands.errors.CheckFailure): # CheckFailure is when the user type/privelage is not correct for command
        await ctx.send(f'{ctx.author}, you do not have the correct role for this command.')

bot.run(TOKEN)