const radio_button = document.getElementsByClassName('radio_button');
const radio_wraper = document.getElementsByClassName('radio_wraper');
const submit_button = document.getElementsByClassName('quiz_submit');
const input = document.getElementsByClassName('input');

const size=radio_button.length;

for(var i = 0; i < size; i++) {
    radio_wraper[i].addEventListener("click", checkUncheck);
}
for(var i = 0; i < size; i++) {
    radio_button[i].addEventListener("change", isChacked);
}

function checkUncheck(e){
    const item = e.target.getElementsByTagName('input');
    item[0].checked=true;
    submit_button[0].disabled=false;
    isChacked();
}

function isChacked(){
    var counter=0;
    for(counter;counter<size;counter++){
        if(radio_button[counter].checked == true){
            radio_wraper[counter].classList.add('radio_checked');
        }
        else{
            radio_wraper[counter].classList.remove('radio_checked');
        }
    }
}




//ALLCOURSES
const courses = document.getElementsByClassName('course');
if(courses.length!=0){
    courses[0].addEventListener("click", function(){
    location.replace("http://localhost/Site/CzechScript/course_html.php");
    });
}



if(input.length==1){
    input[0].addEventListener('input',function(){
        submit_button[0].disabled=false;
    })
    input[0].addEventListener('focusout',function(){
        if(input[0].value==""){
            submit_button[0].disabled=true;
        }
    })
}else if(input.length==2){
    var dis1=0;
    var dis2=0;
    input[0].addEventListener('input',function(){
        dis1=1;
        canContinue();
    })
    input[0].addEventListener('focusout',function(){
        if(input[0].value==""){
            dis1=0;
        }
        canContinue();
    })
    input[1].addEventListener('input',function(){
        dis2=1;
        canContinue();
    })
    input[1].addEventListener('focusout',function(){
        if(input[1].value==""){
            dis2=0;
        }
        canContinue();
    })
}
function canContinue(){
    if(dis1==1&&dis2==1){
        submit_button[0].disabled=false;
    }else{
        submit_button[0].disabled=true;
    }
}

const lesson_click = document.getElementsByClassName('lesson_top');
const lesson_show = document.getElementsByClassName('lessons');
const lesson_height = document.getElementsByClassName('lesson');
const size2 = lesson_click.length;

for(var i = 0; i < size2; i++) {
    lesson_click[i].addEventListener("click", showLessons);
}

function showLessons(e){
    const item = e.target.parentElement.getElementsByClassName('lessons');
    const item2 = e.target.parentElement;
    item[0].classList.toggle('lessons_visible');
    item2.classList.toggle('lesson_height');

}