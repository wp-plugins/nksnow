// Definitions
//snowflakes = <?php get_option('nksnow_snowflakes') ?>;
posx = new Array();
posy = new Array();
speedx = 0;
speedy = new Array();
maxwidth = document.documentElement.clientWidth;
maxheight = document.documentElement.clientHeight;
flakesize = 40; // width + height of snowflake + some more :-/

// Create some position + movement data
for (i = 0; i < snowflakes; i++) {
	// starting position
	posy[i] = -17 - Math.random() * maxheight;
	posx[i] = maxwidth / snowflakes * i;
	// movement
	speedy[i] = 5 + Math.random() * 5;
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
			if (speedx < 5 && speedx > -5) {
				speedx = speedx -10 + Math.random() * 20;
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
	window.setTimeout("snow()", 75); // and repeat
}
