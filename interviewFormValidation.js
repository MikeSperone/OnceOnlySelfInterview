/**
 * Created by Mike on 11/22/15.
 */

var a = 1; //global counters for these 3 functions, respectively
var b = 1;
var c = 1;
function addPersonalLink(x)
{
    var linkObject = "<div class='formLine'>"+
        "<div class='formSection'>Link "+x+":<br/> <input type='url' name='link"+x+"' placeholder='http://website.com/myinfo/'> </div>"+
        "<div class='formSection'>Link Text "+x+":<br/> <input type='text' name='linkText"+x+"' placeholder='Personal website'> </div>"+
        "<div class='spacer'></div>"+
        "</div><br/>";
    var newPersonalLink = document.createElement('div');
    newPersonalLink.innerHTML = linkObject;
    document.getElementById("personalLinks").appendChild(newPersonalLink);
    a +=1;
}

function addLecture(x)
{
    var lectureObject = "<div class='formLine'><div class='formSection'>Link "+x+":<br/><input type='url' name='talk_Link"+x+"' placeholder='http://website.com/webpage/talk.html'></div>"+
        "<div class='formSection'>Link Text:<br/><input type='text' name='talk_LinkText"+x+"' placeholder='Title of Talk'></div></div><br/>"+
        "<div class='formLine'><div class='formSection'>Location:<br/><input id='location' type='text' name='talk_location"+x+"' placeholder='TedX Albequerque'></div>"+
        "<div class='formSection'>Year:<br/> <input id='year' type='number' name='talk_year"+x+"' placeholder='2011' size='4' min='1900'><!--  + to input more  --></div>"+
        "<div class='spacer'></div></div><br/>";
    var newLectureLink = document.createElement('div');
    newLectureLink.innerHTML = lectureObject;
    document.getElementById("lectureLinks").appendChild(newLectureLink);
    b+=1;
}

function addPublication(x) {
    var pubObject = "<div class='formLine'>" +
        "<div class='formSection'>Link " + x + ":<br/><input type='url' name='pub_Link" + x + "' placeholder='http://website.com/webpage/article.html'> </div>" +
        "<div class='formSection'>Link Text " + x + ":<br/><input type='text' name='pub_LinkText" + x + "' placeholder='Title of Talk'> </div>" +
        "<div class='formSection'>Year:<br/> <input id='year' type='number' name='pub_year" + x + "' placeholder='2011' size='4' min='1900'><!--  + to input more  --> </div>" +
        "<div class='spacer'></div></div><br/>";
    var newPublicationLink = document.createElement('div');
    newPublicationLink.innerHTML = pubObject;
    document.getElementById("publicationLinks").appendChild(newPublicationLink);
    c+=1;
}