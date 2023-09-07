  <!-- App favicon -->

  
      <?=link_tag('admin/assets/images/favicon.ico')?>

    
      
      <?=link_tag('admin/assets/libs/chartist/chartist.min.css')?>

      <?=link_tag('admin/assets/css/bootstrap.min.css')?>

      <?=link_tag('admin/assets/css/icons.min.css')?>

      <?=link_tag('admin/assets/css/app.min.css')?>
      
      <?=link_tag('admin/assets/libs/sweetalert2/sweetalert2.min.css')?>


          <style>

           .full-switch
            {
                width: 84px !important;
            }

            input.form-switch:checked +.full-switch::after{

                left:60px !important;


            }
               input.form-switch:checked +.full-switch::before{

                right:25px !important;


            }

           input.form-switch + .full-switch::before{

                left:15px !important;


            }
                 .form-group label {
            position: absolute;
            top: 8px;
            left: 10px;
            background-color: white;
            padding: 0 5px;
            color: #999;
            transition: 0.2s;
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -12px;
            font-size: 12px;
            background-color: white;
            padding: 0 5px;
        }
            .remove-icon-user
            {
                    background-color: darkred;
     width: 13px; 
     text-align: center;
     cursor: pointer;
    padding-top: 5px;
    color: white;
    height: 13px;
    font-size: 8px;
    font-weight: bold;
    border-radius: 25px;
    position: relative;
    padding-top: 1px;
    left:27px;
    bottom: 48px;
    display:block;
/*    visibility: hidden;*/
            }
            .validation-error
            {
                    
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: var(--bs-form-invalid-color);
            }

            .team-members
            {
                padding-left: 30px;
            }

            .team-members div
            {
               display: inline-block;
               width: 18%;


            }

            .role-member
            {
              margin-left:-30px;

            }

            .zIndex0
            {
                  z-index: 0;
            }
            .zIndex1
            {
                  z-index: 2;
            }
            .zIndex0:hover
            {
                 z-index: 3;
            }

         

            .users-list
            {
                border:1px dotted;
                padding:5px;
                max-height: 300px;

            }

            .vertical-scroll-bar::-webkit-scrollbar {
    width: 6px; /* Adjust the width of the scrollbar */
    height: 6px;
}

.vertical-scroll-bar::-webkit-scrollbar-thumb {
    background-color: transparent; /* Color of the thumb */
    border-radius: 6px; /* Rounded corners */
}

.vertical-scroll-bar::-webkit-scrollbar-thumb:hover {
    background-color: gray; /* Hover color */
}

/* Style the scrollbar track */
.vertical-scroll-bar::-webkit-scrollbar-track {
    background-color: transparent; /* Color of the track */
}

/* Style the scrollbar corners */
.vertical-scroll-bar::-webkit-scrollbar-corner {
    background-color: transparent; /* Color of the scrollbar corners */
}

        </style>