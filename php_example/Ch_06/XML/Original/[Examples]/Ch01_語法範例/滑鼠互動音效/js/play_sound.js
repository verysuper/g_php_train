//music陣列用來存放各種音效的路徑
var music=new Array("dreamweaver.wav","flash.wav","fireworks.wav");

function playSound(i){
//在Div內放置Embed並指定其src = 某音效位置
document.getElementById("sounds").innerHTML = "<embed width=0 height=0 src="+music[i]+" autostart='true'></embed>";
}