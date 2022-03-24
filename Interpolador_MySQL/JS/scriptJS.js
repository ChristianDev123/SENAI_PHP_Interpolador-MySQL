const btnSubmit = document.querySelector('#btnSubmit');
const btnRegister = document.querySelector('#btnRegister');

function handlerData(){
    const databaseName = document.querySelector('#user_database').value;
    const URLSheety = document.querySelector('#user_url').value;
    const variableList = document.querySelector('#user_variables').value;
    const tableBD = document.querySelector('#user_table').value;
    const columnBD = document.querySelector('#user_columns').value; 
    const inputHidden = document.querySelector('#path_data');
    const variableArray = variableList.split(';');
    const columnArray = columnBD.split(';');

    var packageDatas = '';
    
    fetch(URLSheety)
    .then(async(response)=>response.json())
    .then((json)=>{
        packageDatas = {
            databaseName: databaseName,
            variableList: variableArray,
            datasDatabase:json.página1,
            table:tableBD,
            columns:columnArray
        };
        inputHidden.value = JSON.stringify(packageDatas);
    });

    btnSubmit.disabled= false;
    btnRegister.disabled = true;
}
function liberateRegister(){
    btnSubmit.disabled = true;
    btnRegister.disabled = false;
}