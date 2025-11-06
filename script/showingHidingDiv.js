/*var element = document.getElementById('myDiv');
					var height = element.offsetHeight;
					alert(height);
					document.write(height);*/
					if (document.getElementById('myDiv').offsetHeight < 405) { 
						document.getElementById('subscribe').style.display = 'none'; 
						document.getElementById('counter').style.display = 'none'; 
					}else if (document.getElementById('myDiv').offsetHeight < 625) {
						document.getElementById('counter').style.display = 'none';
					};/*else{
						document.getElementById('subscribe').style.display = 'block';
						document.getElementById('counter').style.display = 'block';
					};*/
