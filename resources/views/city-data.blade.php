<!DOCTYPE html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<style>
li{
    list-style:none;
}
.personal_data{
    width:auto;
    float:left;
}
.carData{
    width: auto;
    float: left;
}
ul.showData{
   
    padding:0;
}
.insertSearch{
    width:250px;
    height:25px;
    padding: 5px;
}
#clickBtn,.clickBtn{
    text-decoration:none;
    margin-left:10px;
    font-size:20px;
    height:25px;
    width:50px;
    border:1px solid #A90213;
    padding:5px;
    background:#A90213;
    color:white;
    font-weight:bold;
}
li.dataRow{
    float: left;
    width: 47%;
    margin: 0 10px 10px 0;
    border:1px solid;
    padding:10px;
}
.carData{
    margin-left: 60px;
}
.dataGetVal{
    text-align: center;
}


</style>
<script>
$(document).ready(function() {
    $('#clickBtn').click(function(){
        var valueData = $('.insertSearch').val();
        if(/\S/.test(valueData)){
            getTheData(valueData);
        }else{
            alert('Please enter a value');
        }
    });
    $('.clickBtn').click(function(){
        getAllData();
    });
});

function getAllData(){
    $('.showData').empty();

	$.ajax({
	'url':'http://127.0.0.1:8000/api/cityData',
	'type':'get',
	'success': function(data){
        var setData = new Array();
        var z=0;
        
		for(var i=0;i<data.length;i++){
           
            setData.push(data[i]);
        }
        
        printAllData(setData);
	}
	});
    
}
function getTheData(valueData){
    $('.showData').empty();
	$.ajax({
	'url':'http://127.0.0.1:8000/api/cityData',
	'type':'get',
	'success': function(data){
        var setData = new Array();
        var z=0;
        
		for(var i=0;i<data.length;i++){
           
            var currentVal = data[i]; 
            
            $.each(currentVal,function(index,value){
                var p = value.toString().toLowerCase();
                var q = valueData.toString().toLowerCase();
                if( q.indexOf(p) >= 0 ){
                    setData.push(currentVal);
                }
            });
        }
        
        printAllData(setData);
	}
	});
    
}
function printAllData(setData){
    $.each(setData,function(key,val){
            
            var create_element = $(
                "<li class='dataRow run"+val.id+"'><div class='personal_data'><div class='firstname'><label class='fname'>First Name: </label><span>"
                + val.Person_fname +
                "</span></div><div class='lastname'><label class='sname'>Last Name: </label><span>"
                +val.Person_sname +
                "</span></div><div class='ageP'><label class='age'>Age: </label><span>"
                + val.age +
                "</span></div><div class='addressFull'><label class='address'>Address: </label><span>"
                +val.Street_no+ " " +val.Street_name+ ", " +val.City+ " " + val.Postal_code+
                "</span></div></div><div class='carData'><div class='car_brand'><label class='CarBrand'>Car Brand: </label><span>" 
                +val.Car_brand+
                "</span></div><div class='car_color'><label class='CarColor'>Car Color: </label><span>"
                 +val.Car_color+
                 "</span></div><div class='car_plate'><label class='CarReg'>Car Plate: </label><span>"
                 +val.Car_plate+
                "</span></div></div></li>");
                $(create_element).appendTo($('.showData'));
         });
}
</script>

<head>

<body>
    <div class="container">
        <div class="dataGetVal">
        <h2>Use the search bar to find every detail using person name, car brand, street name and license plate or click "Get all data" button to get all data. </h2>
            <input class="insertSearch" type="text" /><a id="clickBtn" href="javascript:void(0)">Search</a>
            <a class="clickBtn" href="javascript:void(0)">Get all data</a>
        </div>   
            <ul class="showData"></ul>
        
    </div>
</body>
</html>