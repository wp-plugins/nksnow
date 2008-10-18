// Definitions
posx = new Array();
posy = new Array();
speedx = Math.random() * maxstepx;
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
		flakesize = 25;
		break;
	case 5:
	case 1:
		flakesize = 4;
		break;
	case 4:
		flakesize = 8;
		break;
}

// Create some position + movement data
for (i = 0; i < snowflakes; i++) {
	// starting position
	posy[i] = Math.random() * maxheight;
	posx[i] = maxwidth / snowflakes * i;
	// movement
	speedy[i] = maxstepy / 2 + Math.random() * maxstepy / 2;
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
			if (speedx < maxstepx/2 && speedx > -maxstepx/2) {
				speedx = speedx - maxstepx + Math.random() * maxstepx;
			}
		}
		// wind effect diminishes with time
		if (speedx > 0) {
			if (Math.random() > 0.9) {
				speedx = speedx - 0.1;
			}
		}
		else if (speedx < 0) {
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
