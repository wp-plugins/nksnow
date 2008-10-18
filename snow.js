// Definitions
posx = new Array();
posy = new Array();
speedx = 0;
speedy = new Array();

maxwidth = window.innerWidth;
maxheight = window.innerHeight;
if (!maxwidth) {
	maxwidth = document.documentElement.clientWidth;
	maxheight = document.documentElement.clientHeight;
}
if (!maxwidth) {
	maxwidth = document.body.clientWidth;
	maxheight = document.body.clientHeight;
}

switch (snowflake) {
	default:
	case 0:
		flakesize = 40; // width + height of snowflake + some more :-/
		break;
	case 1:
		flakesize = 4;
		break;
}

// Create some position + movement data
for (i = 0; i < snowflakes; i++) {
	// starting position
	posy[i] = -17 - Math.random() * maxheight;
	posx[i] = maxwidth / snowflakes * i;
	// movement
	speedy[i] = maxstep / 2 + Math.random() * maxstep / 2;
}


window.onload=function(){
  snow();
}

function snow() {
	for (i = 0; i < snowflakes; i++) {
		posy[i] = posy[i] + speedy[i];
		posx[i] = posx[i] + speedx;
		// wind effect
		if (Math.random() > 0.99) {
			if (speedx < maxstep/2 && speedx > -maxstep/2) {
				speedx = speedx - maxstep + Math.random() * maxstep;
			}
		}
		// wind effect diminishes with time
		if (speedx > 0) {
			if (Math.random() > 0.9) {
				speedx = speedx - 0.1;
			}
		}
		if (speedx < 0) {
			if (Math.random() > 0.9) {
				speedx = speedx + 0.1;
			}
		}
		// move flakes when they reach a limit
		if (posy[i] > maxheight - flakesize) {
			posy[i] = - flakesize - Math.random() * maxheight / 2;
		}
		else if (posx[i] > maxwidth - flakesize) {
			posx[i] = 0 + flakesize;
			posy[i] = maxheight - flakesize - Math.random() * maxheight;
		}
		if (posx[i] < flakesize) {
			posx[i] = maxwidth - flakesize;
			posy[i] = maxheight - flakesize - Math.random() * maxheight;
		}
		document.getElementById(i).style.top=posy[i] + "px";
		document.getElementById(i).style.left=posx[i] + "px";
	}
	window.setTimeout("snow()", timeout); // and repeat
}
