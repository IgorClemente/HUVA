

function OkChange(){
    var Check = document.querySelector("#ch_" + this.dataset.ref);
    var Forms = document.getElementsByClassName("sumisso");

        console.log(Check);
        console.log(Forms);
        if(Check.value === 'sim'){
            for(var i=0;i<Forms.length;i++){
                var jog = Forms[i];
                    jog.classList.remove("some-tudo");
                    jog.classList.add("aparece-tudo");
            }

        }else if(Check.value === 'nao'){
                for(var j=0;j<Forms.length;j++){
                    var jog2 = Forms[j];
                        jog2.classList.remove("aparece-tudo");
                        jog2.classList.add("some-tudo");
                }
        }
}

var Op = document.getElementsByClassName("Op");

    for(var i=0;i<Op.length;i++)
    {
        Op[i].addEventListener("change",OkChange);
    }

