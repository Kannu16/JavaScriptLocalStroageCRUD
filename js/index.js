let id1 = "no";
loadEvents();
viewData();
function Add() {
  let name = document.getElementById("name").value;
  let date = document.getElementById("date").value;
  let description = document.getElementById("description").value;
  let type = document.getElementById("type").value;
  let color = document.getElementById("color").value;
  let id = 1;
  if (id1 == "no") {
    let eventArr = JSON.parse(localStorage.getItem("events"));
    if (eventArr === null) {
      let data = [
        {
          id,
          name,
          date,
          description,
          type,
          color,
        },
      ];
      localStorage.setItem("events", JSON.stringify(data));
    } else {
      id++;
      eventArr.push({
        id,
        name,
        date,
        description,
        type,
        color,
      });
      localStorage.setItem("events", JSON.stringify(eventArr));
      viewData();
    }
    resetForm();
  } else {
    let eventArr = JSON.parse(localStorage.getItem("events"));
    eventArr[id1].name = name;
    eventArr[id1].date = date;
    eventArr[id1].description = description;
    eventArr[id1].type = type;
    eventArr[id1].color = color;
    localStorage.setItem("events", JSON.stringify(eventArr));
    resetForm();
    viewData();
  }
}

function viewData() {
  let eventArr = JSON.parse(localStorage.getItem("events"));

  if (eventArr.length < 1) {
    document.getElementById("msg").innerHTML = "No events to show";
    document.getElementById("msg").style.display = "block";
    document.getElementById("tableRow").style.display = "none";
  } else {
    document.getElementById("msg").style.display = "none";
    if (eventArr != null) {
      let num = 1;
      let html = "";
      for (let i in eventArr) {
        html += `
    <tr id="tableRow">
       <td >${num}</td>
       <td>${eventArr[i].name}</td>   
       <td>${eventArr[i].date}</td>     
       <td>${eventArr[i].description}</td>    
       <td>${eventArr[i].type}</td>    
       <td>${eventArr[i].color}</td>
       <td>
       <i class="fas fa-edit  edit-icon" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editData(${i})"></i>
       <i class="fas fa-trash ms-3  delete-icon" href="javascript:void(0)" onclick="deleteData(${i})"></i> 
       </td>                       
    </td>
   `;
        num++;
      }
      document.getElementById("eventList").innerHTML = html;
    }
  }
}

function deleteData(data) {
  if (confirm("Are you sure want to delete this event")) {
    let eventArr = JSON.parse(localStorage.getItem("events"));
    eventArr.splice(data, 1);
    localStorage.setItem("events", JSON.stringify(eventArr));
  }
  viewData();
}

function editData(data) {
  document.getElementById("submit-update").value = "Update";
  id1 = data;
  let eventArr = JSON.parse(localStorage.getItem("events"));
  document.getElementById("name").value = eventArr[data].name;
  document.getElementById("date").value = eventArr[data].date;
  document.getElementById("description").value = eventArr[data].description;
  document.getElementById("type").value = eventArr[data].type;
  document.getElementById("color").value = eventArr[data].color;
  viewData();
}

function resetForm() {
  document.getElementById("name").value = "";
  document.getElementById("date").value = "";
  document.getElementById("description").value = "";
  document.getElementById("type").value = "";
  document.getElementById("color").value = "";
}

function loadEvents() {
  let eventArr = JSON.parse(localStorage.getItem("events"));
  $("#calendar").evoCalendar({
    theme: "Orange Coral",
    calendarEvents: eventArr,
  });
}
