<!-- 
yourLogo='*���K�q���h�C������s�@*���ĹϤ�*�ʵe�v��'; logoFont='�s�ө���'; logoSize=2;
logoColor='0080FF';
logoWidth=70; logoHeight=70; logoSpeed=0.01; yourLogo=yourLogo.split('');
L=yourLogo.length; 
Result="<font face="+logoFont+" size="+logoSize+" color="+logoColor+">";
TrigSplit=360/L;
br=(document.layers)?1:0;
if (br){
for (i=0; i < L; i++)
document.write('<layer name="ns'+i+'" top=0 left=0 width=14 height=14">'+Result+yourLogo[i]+'</font></layer>');
}
else{
document.write('<div id="outer" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i=0; i < L; i++)
document.write('<div id="ie" style="position:absolute;top:0px;left:0px;width:14px;height:14px">'+Result+yourLogo[i]+'</font></div>');
document.write('</div></div>');
}
ypos=0;
xpos=0;
step=logoSpeed;
currStep=0;
Y=new Array();
X=new Array();
Yn=new Array();
Xn=new Array();
for (i=0; i < L; i++) 
 {
 Yn[i]=0;
 Xn[i]=0;
 }
(document.layers)?window.captureEvents(Event.MOUSEMOVE):0;
function Mouse(evnt){
 ypos = (document.layers)?evnt.pageY:event.y;
 xpos = (document.layers)?evnt.pageX:event.x;
}
(document.layers)?window.onMouseMove=Mouse:document.onmousemove=Mouse;
function animateLogo(){
if (!br)outer.style.pixelTop=document.body.scrollTop; 
for (i=0; i < L; i++){
var layer=(document.layers)?document.layers['ns'+i]:ie[i].style;
layer.top =Y[i]+logoHeight*Math.sin(currStep+i*TrigSplit*Math.PI/180);
layer.left=X[i]+logoWidth*Math.cos(currStep+i*TrigSplit*Math.PI/180);
}
currStep-=step;
}
function Delay(){
for (i=L; i >= 0; i--)
{
Y[i]=Yn[i]+=(ypos-Yn[i])*(0.1+i/L);           
X[i]=Xn[i]+=(xpos-Xn[i])*(0.1+i/L);        
}
animateLogo();
setTimeout('Delay()',20);
}
window.onload=Delay;
