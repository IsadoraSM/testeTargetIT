function filterSubmit(e){
    //e.preventDefault();
}

//adiciona horário minímo de início caso o agendamento seja na data atual
function inputDate(){
    console.log('inputDate');
    let date = document.getElementById("date").value;

    if(date){
        const today = currentDate();
        console.log(today, date);
        if(date == today){
            const now = currentTime();
            document.getElementById("starting_time").min = now;
        }else{
            document.getElementById("starting_time").min = "";
        }
    }
}

//adiciona horário minímo de início e máximo de fim da reunião
function inputStartingTime(){
    let startingTime = document.getElementById("starting_time").value;
    const endingTime = document.getElementById("ending_time");

    //Adiciona 1 hora na hora de início
    const hh = String((startingTime.split(":")[0] * 1) + 1).padStart(2, '0'); 

    const mm = startingTime.split(":")[1];

    endingTime.max = hh + ':' + mm;

    endingTime.min = startingTime;
}

//retorna a data atual
function currentDate(){
    let today = new Date();
    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0'); //Acrescenta um pois janeiro é 0
    const yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    return today;
}

//retorna a hora atual
function currentTime(){
    let now = new Date();

    const hh = String(now.getHours()).padStart(2, '0');
    const mm = String(now.getMinutes()).padStart(2, '0');

    now = hh + ':' + mm;

    return now;   
}