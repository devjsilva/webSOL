
var teacher = 0;
var student = 0;

// SIGN IN TEACHER
function sign_in_teacher() {
	if(!teacher){
		teacher = 1;
		student = 0;

	var elem = document.getElementById("student_form");
	if(elem){
		elem.parentNode.removeChild(elem);
	}

	elem = document.getElementById("student_desc");
	if(elem){
		elem.parentNode.removeChild(elem);
	}

	$("#signin_form").append("<div class=\"col-md-12\" id=\"teacher_form\">" 
		+"<div class=\"col-md-12\">"
			+"<h4> My Teacher Account... </h4>"
		+"</div>"
		+"<div class=\"col-md-12\">"
			+"<input type=\"text\" id=\"name\" placeHolder=\"Name\"/>"
		+"</div>"
		+"<div class=\"col-md-12\">"
			+"<input type=\"text\" id=\"department\" placeHolder=\"Department\"/>"
		+"</div>"
		+"<div class=\"col-md-12\">"
			+"<input type=\"text\" id=\"office\" placeHolder=\"Office\"/>"
		+"</div>"
		+"<div class=\"col-md-12\">" 
			+"<button type=\"submit\" class=\"blue_button\">Sign in as Teacher</button>"
		+"</div>"
	+"</div>");


	$("#formulario").append("<div class=\"col-md-6 signin_desc\" id=\"teacher_desc\">"
		+"<h3>As a Teacher you can...</h3>"	
		+"<p> <img src=\"source/img/icons/dark_icons/dark_course.png\"/> Create Courses </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_class.png\"/> Manage Classes </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_workteam.png\"/> Manage Workteam </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_project.png\"/> Publicate Projects </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_project_delivery.png\"/> Receive and Manage Project Deliveries </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_student.png\"/> Manage Students </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_evaluation.png\"/> Evaluate Students </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_grade.png\"/> Generate Grade Sheets </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_teacher.png\"/> And much more... </p>"
		+"</div>");
	}
}

// SIGN IN STUDENT
function sign_in_student() {
	if(!student){
		student = 1;
		teacher = 0;


	var elem = document.getElementById("teacher_form");
	if(elem){
		elem.parentNode.removeChild(elem);
	}

	elem = document.getElementById("teacher_desc");
	if(elem){
		elem.parentNode.removeChild(elem);
	}

	$("#signin_form").append("<div class=\"col-md-12\" id=\"student_form\">" 
		+"<div class=\"col-md-12\">"
			+"<h4> My Student Account... </h4>"
		+"</div>"
		+"<div class=\"col-md-12\">"
			+"<input type=\"text\" id=\"name\" placeHolder=\"Name\"/>"
		+"</div>"
		+"<div class=\"col-md-12\">"
			+"<input type=\"text\" id=\"number\" placeHolder=\"Number\"/>"
		+"</div>"
		+"<div class=\"col-md-12\" style=\"margin-bottom:20px;height:40px\">"
			+"<div class=\"col-xs-4\"> <label for=\"gender\">Gender:</label> </div>"
			+"<div class=\"col-xs-4\"> <input type=\"radio\" name=\"gender\" value=\"m\"> Male</input> </div>"
			+"<div class=\"col-xs-4\"> <input type=\"radio\" name=\"gender\" value=\"f\"/> Female</input> </div>"
		+"</div>"		
		+"<div class=\"col-md-12\">" 
			+"<button type=\"submit\" class=\"blue_button\">Sign in as Student</button>"
		+"</div>"
	+"</div>");

	$("#formulario").append("<div class=\"col-md-6 signin_desc\" id=\"student_desc\">"
		+"<h3>As a Student you can...</h3>"	
		+"<p> <img src=\"source/img/icons/dark_icons/dark_course.png\"/> Subscribe to Courses </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_project.png\"/> Participate in Projects </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_project_delivery.png\"/> Submit Project Deliveries </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_group.png\"/> Create and Manage Groups </p>"
		+"<p> <img src=\"source/img/icons/dark_icons/dark_student.png\"/> And much more... </p>"
		+"</div>");
	}

}

