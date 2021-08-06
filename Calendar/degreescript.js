$(document).ready(function() {
    $("#degree").change(function() {
        switch($(this).val()) {
            case 'general':
                $("#programs").html("<option value=''>What is general?</option>");
                break;
            case 'transfer':
                $("#programs").html("<option value='' selected disabled hidden>Choose Program</option><option value='accounting'>Accounting</option><option value='allied_health'>Allied Health & Biological Sciences</option><option value='business_admin'>Business Administration</option><option value='business_admin_potsdam'>Business Administraction (SUNY Potsdamn)</option><option value='childhood_edu_potsdam'>Childhood Education (SUNY Potsdam)</option><option value='childhood_edu_teacher'>Childhood Education (Teacher Education Transfer)</option><option value='comp_info_sys'>Computer Information Systems</option><option value='comp_sci'>Computer Science</option><option value='creative_writing'>Creative Writing</option><option value='criminal_justice'>Criminal Justice</option><option value='early_childhood'>Early Childhood</option><option value='eng_science'>Engineering Science</option><option value='health_care'>Health Care Management</option><option value='homeland_sec'>Homeland Security</option><option value='human_serv'>Human Services</option><option value='human_and_social'>Humanities & Social Sciences</option><option value='ind_studies'>Individual Studies</option><option value='lit_conc'>Literature Concentration</option><option value='math'>Mathematics</option><option value='phys_ed'>Physical Education</option><option value='phys_science'>Physical Science Concentration</option><option value='psych'>Psychology Concentration</option><option value='sports_manag'>Sports Management</option>");
                break;
            case 'career':
                $("#programs").html("");
                break;
            default:
                $("#programs").html("<option value='' selected disabled hidden>Choose Program</option>");
            }
        });
    });

    function resetForm() {
        document.getElementById("programs").innerHTML =
                    "<option value='' selected disabled hidden>Choose Degree Type</option>";
    }