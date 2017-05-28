$( document ).ready(function() {//
   $('#id_periodstart').change(function() {
	   var start = $('#id_periodstart').val();
	   try {
		   start = parseInt(start);
		} catch (e) {
			console.log('Error when try parse int');
		}
		$('#id_periodend').children().show();
		for(let i = 1; i < start; i++) {
			$('#id_periodend #' + i).hide();
		}
		$('#id_periodend').val(start);
   })

   $('.all_lecture').hide();
   $('.time').hide();
   $('.table_statistic').hide();
   $('.frequency_table_statistic').hide();

   $('.statistic').change(function() {
	   switch ($('.statistic').val()) {
	   case 'lecture':
	   		$('.frequency_table_statistic').hide();
		   var lectureId = $('.all_lecture select').val();
		   var request = $.ajax({
		     url: "http://localhost:8080/datn_devicemanager/public/statistic/lecture/2",
		     type: "GET",
		   });
		   request.done(function(msg) {
			   var divLecture = `<div class = "all_lecture">
      				<select onclick = "lectureChange()" name = "all_lecture">
       					<option value = "0">Chọn giảng viên:</option>
		   			</select>
		   		</div>`;
		   		$('.all_lecture').replaceWith(divLecture);
			   for( let lecture of msg) {
				   var element = `<option value = ${lecture.id}>${lecture.name}</option>`;
				   $('.all_lecture select').append(element);
			   }
		   });
		   request.fail(function(jqXHR, textStatus) {
			   console.log(textStatus);
		   });
		   $('.all_lecture').show();
		   $('.time').hide();
		   break;
	   case 'frequency':
		   $('.all_lecture').hide();
		   $('.time').hide();
		   $('.table_statistic').hide();
		   $('.frequency_table_statistic').show();
		   //alert('vô');
		   statisticFrequency();
		   break;
	   case 'borrowing':
		   $('.all_lecture').hide();
		   $('.time').hide();
		   $('.frequency_table_statistic').hide();
		   statisticBorrowing();
		   break;
	   case 'time':
		   $('.all_lecture').hide();
		   $('.time').show();
		   $('.frequency_table_statistic').hide();
		   break;
	   }
   })
});

// lectureChange
function lectureChange() {
		$('.table_statistic').show();
		var lectureId = $('.all_lecture select').val();
	   	var request = $.ajax({
	     url: "http://localhost:8080/datn_devicemanager/public/statistic/statistic_by_lecture/" + lectureId,
	     type: "GET",
	   });
	   request.done(function(msg) {
		   //$('.statistic_resutl').remove();
		   var statisticResult = `<tbody class = 'statistic_result'>
    	
    							  </tbody>`;
    		$('.statistic_result').replaceWith(statisticResult);
		   for( let history of msg) {
			   var element = `
			   <tr>
			    <td>${history.borrower.name}</td>
			   	<td>${history.device.name}</td>
			   	<td>${history.periodofclassstart.name}</td>
			   	<td>${history.periodofclassend.name}</td>
			   	<td>${history.date_borrow}</td>
			   	<td>${history.date_render}</td>
			   	<td>${history.lender.name}</td>
			   </tr>`;
			   $('.statistic_result').append(element);
		   }
	   });
	   request.fail(function(jqXHR, textStatus) {
		   console.log(textStatus);
	   });
}
function timeChange(){
	var dateStart = new Date(document.getElementById("time_start").value);
	var dateEnd = new Date(document.getElementById("time_end").value);
	var dayStart = parseInt(dateStart.getDate());
	var dayEnd = parseInt(dateEnd.getDate()) + 1;
	var monthStart = parseInt(dateStart.getMonth()) + 1;
	var monthEnd = parseInt(dateEnd.getMonth()) + 1;
	var timeStart = dayStart + "-" + monthStart + "-" + dateStart.getFullYear();
	var timeEnd = dayEnd + "-" + monthEnd + "-" + dateEnd.getFullYear();
	statisticTime(timeStart, timeEnd);
	//alert(timeStart + timeEnd);
}

function statisticBorrowing(){
	$('.table_statistic').show();
	var request = $.ajax({
	     url: "http://localhost:8080/datn_devicemanager/public/statistic/statistic_borrowing",
	     type: "GET",
	   });
	   request.done(function(msg) {
		   //$('.statistic_resutl').remove();
		   var statisticResult = `<tbody class = 'statistic_result'>
    	
    							  </tbody>`;
    		$('.statistic_result').replaceWith(statisticResult);
		   for( let history of msg) {
			   var element = `
			   <tr>
			   	<td>${history.borrower.name}</td>
			   	<td>${history.device.name}</td>
			   	<td>${history.periodofclassstart.name}</td>
			   	<td>${history.periodofclassend.name}</td>
			   	<td>${history.date_borrow}</td>
			   	<td>${history.date_render}</td>
			   	<td>${history.lender.name}</td>
			   </tr>`;
			   $('.statistic_result').append(element);
		   }
	   });
	   request.fail(function(jqXHR, textStatus) {
		   console.log(textStatus);
	   });
}

function statisticTime(timeStart, timeEnd){
	$('.table_statistic').show();
	var request = $.ajax({
	     url: "http://localhost:8080/datn_devicemanager/public/statistic/statistic_time/" + timeStart + "/" + timeEnd,
	     type: "GET",
	   });
	   request.done(function(msg) {
		   //$('.statistic_resutl').remove();
		   var statisticResult = `<tbody class = 'statistic_result'>
    	
    							  </tbody>`;
    		$('.statistic_result').replaceWith(statisticResult);
		   for( let history of msg) {
			   var element = `
			   <tr>
			   	<td>${history.borrower.name}</td>
			   	<td>${history.device.name}</td>
			   	<td>${history.periodofclassstart.name}</td>
			   	<td>${history.periodofclassend.name}</td>
			   	<td>${history.date_borrow}</td>
			   	<td>${history.date_render}</td>
			   	<td>${history.lender.name}</td>
			   </tr>`;
			   $('.statistic_result').append(element);
		   }
	   });
	   request.fail(function(jqXHR, textStatus) {
		   console.log(textStatus);
	   });
}

function statisticFrequency(){
	$('.frequency_table_statistic').show();
	var request = $.ajax({
	     url: "http://localhost:8080/datn_devicemanager/public/statistic/statistic_frequency",
	     type: "GET",
	   });
	   request.done(function(msg) {
		   //$('.statistic_resutl').remove();
		   var statisticResult = `<tbody class = 'frequency_statistic_result'>
    	
    							  </tbody>`;
    		$('.frequency_statistic_result').replaceWith(statisticResult);
		   for( let history of msg) {
			   var element = `
			   <tr>
			   	<td>${history.device.name}</td>
			   	<td>${history.his_count}</td>
			   </tr>`;
			   $('.frequency_statistic_result').append(element);
		   }
	   });
	   request.fail(function(jqXHR, textStatus) {
		   console.log(textStatus);
	   });
}