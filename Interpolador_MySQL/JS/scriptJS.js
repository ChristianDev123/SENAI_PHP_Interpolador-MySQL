function handlerData(){
    const databaseName = document.querySelector('#user_database').value;
    const URLSheety = document.querySelector('#user_url').value;
    const variableList = document.querySelector('#user_variables').value;
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
            columns:columnArray
        };
        inputHidden.value = JSON.stringify(packageDatas);
    });
}