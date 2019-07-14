
function GetSlideAngle(dx, dy) {
return Math.atan2(dy, dx) * 180 / Math.PI;
}

//根据起点和终点返回方向 1：向上，2：向下，3：向左，4：向右,0：未滑动

function GetSlideDirection(startX, startY, endX, endY) {
var dy = startY - endY;
var dx = endX - startX;
var result = 0;
//如果滑动距离太短

if (Math.abs(dx) < 2 && Math.abs(dy) < 2) {
return result;
}
var angle = GetSlideAngle(dx, dy);
if (angle >= -45 && angle < 45) {
result = 4;
} else if (angle >= 45 && angle < 135) {
result = 1;
} else if (angle >= -135 && angle < -45) {
result = 2;
}
else if ((angle >= 135 && angle <= 180) || (angle >= -180 && angle < -135)) {
result = 3;
}
return result;
}
var _startX = 0;
var _startY = 0;
var scrollHeight = 0;
var scrollWidth = 0;
var currentRange = 0;
var parentEle = null;
var direction = 1;

// 设置侧滑动画

function setScroll(parentElement, value, time) {

parentElement.firstElementChild.style.cssText = "-webkit-transition: transform " + time + "s;-webkit-transform:translateX(" + value + "px);";

parentElement.lastElementChild.style.cssText = "-webkit-transition: transform " + time + "s;-webkit-transform:translateX(" + value + "px);";
}

// 触摸开始
window.addEventListener("touchstart", function (event) {
if (event.targetTouches.length == 1) {
var touch = event.targetTouches[0];
parentEle = H.getParents(event.target, "H-qq-item");

if (H.isElement(parentEle)) {

// 其他兄弟隐藏

var siblings = H.siblings(parentEle);
for (var i = 0; i < siblings.length; i++) {
var _siblingObj = siblings[i];
setScroll(_siblingObj, 0, 0);
}

scrollHeight = parentEle.firstElementChild.clientHeight;
scrollWidth = H.D(".H-qq-menu", parentEle).clientWidth;

for (var i = 0; i < parentEle.lastElementChild.childNodes.length; i++) {
var child = parentEle.lastElementChild.childNodes[i];

if (H.isElement(child)) {
child.style.cssText = "height:" + scrollHeight + "px;line-height:" + scrollHeight + "px;";
}
}

currentRange = Number(parentEle.firstElementChild.style.WebkitTransform.replace(/translateX\(/g, "").replace(/px\)/g, ""));
_startX = touch.pageX;
_startY = touch.pageY;
}
}
}, false);

// 触摸过程

window.addEventListener("touchmove", function (event) {
if (event.targetTouches.length == 1) {
var touch = event.targetTouches[0];
direction = GetSlideDirection(_startX, _startY, touch.pageX, touch.pageY);
if (direction == 3 || direction == 4) {
event.preventDefault();

if (H.isElement(parentEle)) {
var range = touch.pageX - _startX;
if (range <= 0) {
if (range - currentRange >= -scrollWidth && range - currentRange <= 0) {
setScroll(parentEle, (range - currentRange), 0);
}
}else {
if (range + currentRange <= 0){
setScroll(parentEle, (range + currentRange), 0);
}
}
}
}
}
}, false);

// 触摸接触

window.addEventListener("touchend", function (event) {
var touch = event.targetTouches[0];

if (H.isElement(parentEle)) {
currentRange = Number(parentEle.firstElementChild.style.WebkitTransform.replace(/translateX\(/g, "").replace(/px\)/g, ""));

if (direction == 3 && (currentRange < 0)) {
setScroll(parentEle, -scrollWidth, 0.4);
}else if (direction == 4 && currentRange < 80) {

setScroll(parentEle, 0, 0.4);
}else {
setScroll(parentEle, 0, 0.4);
}
}
}, false);
/*
//点击
window.addEventListener("click", function (event) {
var parentEle = H.getParents(event.target, "H-qq-item");
if (H.isElement(parentEle)) {
setScroll(parentEle, 0, 0.4);
}
}, false);
*/
function wo_url(path){
location.href=path;
}


function yygj(id){
if(id==1){
document.getElementById('yygj').setAttribute("class","x");
document.getElementById('onyygj').setAttribute("onclick","yygj('0');");
}else{
document.getElementById('yygj').setAttribute("class","y");
document.getElementById('onyygj').setAttribute("onclick","yygj('1');");
}}