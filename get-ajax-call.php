<script>
var serverURL = "https://api.staging.myhippo.io"; //Staging server URL
var wordpressRestURL = "https://api.staging.myhippo.io/v1/herd/"; //Staging server URL
var auth_token = jQuery("class or id of elementfor call use #, for id use .").val();
function ajaxCallForHippoAPI(){
    jQuery.ajax({
      type : "GET",
      url : wordpressRestURL+"/quote?auth_token="+auth_token+"&street="+variable_name+"&city="+variable_name+"&state="+variable_name+"&first_name="+variable_name+"&last_name="+variable_name+"&email="+emailid_variable+"&phone="+phone_name_variable_name+"&date_of_birth="+dob,
      success: (data) => {
        console.log("ajax success ===================>",data.result);
        let health_clubs = data.result;
        let health_clubs_html_str = "";
        let hideClass = "";
        if( health_clubs.length > 0 ){
          for( let i=0;i<health_clubs.length;i++ ){
            if( health_clubs[i].dist == "NA" ){
              hideClass = "hidden";
            }
            health_clubs_html_str = health_clubs_html_str +
            '<div class="well well-white mini-profile-widget ">'+
              '<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 image-parent-container">'+
                '<div class="image-container" style="background-image: url('+health_clubs[i].featured_img_url+')"></div>'+
				
              '</div>'+
              '<div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 healthclub-widget-right-content">'+
                '<div class="details">'+
                  '<h4>'+health_clubs[i].title+'</h4>'+
                  '<hr class="title-underline">'+
                  '<p><strong>Address: </strong>'+health_clubs[i].address+'</p>'+
                  '<p class="contact-cont"><strong>Contact: </strong>'+health_clubs[i].contact_no+'</p>'+
                  '<!-- <p><strong>Website: </strong><a href="'+health_clubs[i].website+'" target="_blank">'+health_clubs[i].website+'</a></p> -->'+
                  '<p class="dist-cont '+hideClass+'"><strong>Distance: </strong>'+parseFloat(health_clubs[i].dist).toFixed(2)+' '+((health_clubs[i].distance_unit == "K") ? "KM" : (health_clubs[i].distance_unit == "N" ? "NM" : "Mi"))+'</p>'+
                  '<div class="hidden-xs visible-lg visible-md visible-sm"><p class="website-container"><a class="hvr-wobble-horizontal" href="'+health_clubs[i].website+'" target="_blank">Website</a> <a class="hvr-wobble-horizontal" href="https://goodeatsprogram.com/trainers/" >Trainers Click Here</a></p></div>'+
                '</div>'+
              '</div>'+
			  '<div class="visible-xs hidden-lg hidden-md hidden-sm"><div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 no-padding"><p class="website-container"><a href="'+health_clubs[i].website+'" target="_blank">Website</a> <a href="https://goodeatsprogram.com/trainers/" >Trainers Click Here</a></p></div></div>'+
            '</div>';
          }
          jQuery("#health-club-list-container").html(health_clubs_html_str);
          var $listsOfHealthClubs = jQuery('#health-club-list-container .mini-profile-widget');
          jQuery('#search').keyup(function() {
        		var val = jQuery.trim(jQuery(this).val()).replace(/ +/g, ' ').toLowerCase();
        		$listsOfHealthClubs.show().filter(function() {
        			var text = jQuery(this).text().replace(/\s+/g, ' ').toLowerCase();
        			return !~text.indexOf(val);
        		}).hide();
        	});
        }else{
          jQuery("#health-club-list-container").html("No health clubs found.");
        }
      }
    });
  }
  </script>