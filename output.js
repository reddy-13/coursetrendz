html +=
  '<div class="col-md-3">' +
  '<div class="schedule-box maxwidth500 bg-lighter mb-30" style="min-height: 310px;">' +
  '<div class="thumb">' +
  '<img class="img-fullwidth" alt="" src="' +
  course.image_240x135 +
  '">' +
  "</div>" +
  '<div class="schedule-details clearfix p-15 pt-10">' +
  '<div class="text-center pull-left flip bg-theme-colored p-10 pt-5 pb-5 mr-10">' +
  "<ul>" +
  ' <li class="font-19 text-white font-weight-600 border-bottom ">' +
  course.price +
  "</li>" +
  "</ul>" +
  "</div>" +
  '<h4 class="title mt-0" style="font-size:13px;"><a href="#">' +
  course.title.substr(0, 25) +
  "</a></h4>" +
  '<ul class="list-inline font-11 text-gray">' +
  '<li><i class="fa fa-calendar mr-5"></i>Last updated ' +
  course.last_update_date +
  "</li>" +
  '<li><i class="fa fa-map-marker mr-5"></i> Created by ' +
  insrtuct +
  "</li>" +
  "</ul>" +
  '<div class="clearfix"></div>' +
  // '<p class="mt-10">Lorem ipsum dolor sit amet elit. Cum veritatis sequi nulla nihil, dolor voluptatum nemo adipisci eligendi!</p>'+
  '<div class="mt-5">' +
  ' <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="course_detail.php?id=' +
  course.id +
  '">Details</a>' +
  "</div>" +
  "</div>" +
  "</div>" +
  "</div>";
