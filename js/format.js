var btn_join = document.getElementById("join");
var btn_create = document.getElementById("create");
var btn_start = document.getElementById("start");
var txt_code = document.getElementById("txt_code");
var mp_player = document.getElementById("mp_player");
var form = document.getElementById("form");
var txt_info = document.getElementById("info");
var body = document.getElementById("corp");
var Sid = 0;
var SidPrueba = 0;
var SidPrueba2 = 0;
var SidStatic = 0;
var timer;
var mode;
var usr;


document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
        if(usr == "adm"){
        	Sid = {"Sid" : SidStatic};
        	jQuery.ajax({
                data:  Sid,
                url:   'php/stop.php',
                type:  'post',
                beforeSend: function () {
                        
                },
                success:  function (response) {                  

                }
        });
        }
    }
};

btn_start.style.visibility = "hidden";
txt_code.value = "Code...";
btn_create.addEventListener("click", getSid);
btn_join.addEventListener("click", goSid);
btn_start.addEventListener("click", startPlayer);

function getSid(){
	usr = "adm";
 		jQuery.ajax({
                data:  Sid,
                url:   'php/generate_link.php',
                type:  'post',
                beforeSend: function () {
                        txt_code.value = "Generating Code...";
                },
                success:  function (response) {
                        txt_code.value = response;
                        SidStatic = response;
                        Sid = response;
                        btn_start.style.visibility = "visible";
                        btn_join.style.visibility = "hidden";
                        btn_create.style.visibility = "hidden";
                        txt_info.innerHTML = "Put this code on all the devices where you want to play Gandalf and when you're ready press Start";

                }
        });

}


function goSid(){

 Sid = {"Sid" : txt_code.value};
 SidPrueba = txt_code.value; 
 	if(SidPrueba != ""){
 		jQuery.ajax({
                data:  Sid,
                url:   'php/link.php',
                type:  'post',
                beforeSend: function () {
                        txt_code.value = "Conecting...";
                },
                success:  function (response) {
                        txt_code.value = response;
                        if(response == "Conected"){
                        	btn_join.style.visibility = "hidden";
                        	btn_create.style.visibility = "hidden";
                        	txt_code.value = "Awaiting host...";
                        	mode = 1;
                        	timer();
                        }
                }
        });
 	}
 	else{
 		alert("Inserta el codigo!");
 	}

}

function startPlayer(){
	SidPrueba2 = txt_code.value;
	
	var param ={
                "Sid" : SidPrueba2,
                "1" : 1};
	jQuery.ajax({
                data:  param,
                url:   'php/sincro.php',
                type:  'post',
                beforeSend: function () {
                        txt_code.value = "Synchronizing...";
                },
                success:  function (response) {
                        if(response != "error 9"){
                        	form.style.visibility = "hidden";
                        	btn_start.style.visibility = "hidden";
							mp_player.play();
                        }else{
                        	txt_code.value = response;
                        }
                }
        });

}

function timer(){

	if(mode == 1){
		timer = setInterval(fisgon, 1000);
	}

	if(mode == 0){
		clearInterval(timer);
	}

}

function fisgon(){
	Sid = {"Sid" : SidPrueba};
	jQuery.ajax({
                data:  Sid,
                url:   'php/fisgon.php',
                type:  'post',
                beforeSend: function () {
                        
                },
                success:  function (response) {
                        if(response == "true"){
                        	//clearInterval(timer);
                        	form.style.visibility = "hidden";
							mp_player.play();
							
                        }
                        if(response == "false"){
                        	window.location.replace("http://google.com");
                        }
                }
        });

} 

