function filterSubmit(e){
    //e.preventDefault();
}

//adiciona horário minímo de início caso o agendamento seja na data atual
function inputDate(){
    let date = document.getElementById("date").value;

    if(date){
        const today = currentDate();
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

//captura os dados do agendamento
function scheduleButton(obj){
    //Referência da linha
    let objTR = obj.parentNode.parentNode;

    let local = objTR.cells[0].textContent;
    let room = objTR.cells[1].textContent;
    let date = objTR.cells[2].textContent;
    let startingTime = objTR.cells[3].textContent;
    let endingTime = objTR.cells[4].textContent;

    confirmSchedule(local, room, date, startingTime, endingTime);
}

//Exibe um Sweet Alert para o usuário confirmar as informações do agendamento
function confirmSchedule(local, room, date, startingTime, endingTime){
    swal({
        title: "Confirme as informações do agendamento",
        text: 'Local: ' + local + ', ' + room + ', data: ' 
                + date + ', início: '+ startingTime + ', fim: ' + endingTime,
        icon: "warning",
        buttons: ["Cancelar", "Confirmar"],
      })
      .then((willDelete) => {
        if (willDelete) {
            schedule(local, room, date, startingTime, endingTime);
        } else {
          swal("Ação cancelada!");
        }
    });
}

//Realiza o agendamento
function schedule(local, room, date, startingTime, endingTime){
    const user_id = document.getElementById("user_id").value;

    let dateFormat = new Date(date)
    const dateTimeFormat = new Intl.DateTimeFormat('en', { year: 'numeric', month: '2-digit', day: '2-digit' })
    const [{ value: month },,{ value: day },,{ value: year }] = dateTimeFormat .formatToParts(dateFormat )
    
    date = `${year}-${day}-${month}`;
    
    data = {
        user_id,
        local,
        room,
        date,
        starting_time: startingTime,
        ending_time: endingTime
    }

    $.post("api/schedule/store", data, function(data){
        window.location.replace('home');
    });
}