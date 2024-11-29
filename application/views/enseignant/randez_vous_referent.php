<style>
    .assignment-list img{
        height: 40px;
    }
     .single-assignments-wrapper .assignment-list {
        border: none  !important;
        padding: 15px;
        cursor: pointer;
    }
    a.detail_link {
        border-radius: 4px;
        padding: 5px 8px;
        background-color: #e6eff4;
        font-weight: 700;
    }
    .detail_link img {
        height: 30px;
    }
    .assignment-list:hover{
            background-color: #f7fafb;
            box-shadow:  0 2px 4px #d8e1e8;
    }
    .date-picker{
        cursor: pointer;

    }
    textarea{
        height: 227px;
        border-radius: 6px;
        border: 1px solid #DDD8F9;
        padding: 10px 15px;
    }
    .select2-selection--single {
        height: 56px !important;
    }
    span.select2.select2-container {
        width:100% !important;
        height: 56px !important;
    }
    span.select2-selection.select2-selection--multiple {
       height:100%;
        overflow-y: overlay;
    }
</style>
<div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                    <div class="dashboard__section__title">
                                        <h4>Calendrier</h4>
                                    </div>
                                    <div class="calender-area-wrapper" style="color: #737477">
                                <div class="calender-dash-wrapper" id="calender-active">
                                    <!-- calender -->
                                    <div style="" class="wrapper">
        
                                        <div class="container-calendar">
                                            <div class="footer-container-calendar">
                                                <select id="month" onchange="jump()">
                                                    <option value=0>Jan</option>
                                                    <option value=1>Feb</option>
                                                    <option value=2>Mar</option>
                                                    <option value=3>Apr</option>
                                                    <option value=4>May</option>
                                                    <option value=5>Jun</option>
                                                    <option value=6>Jul</option>
                                                    <option value=7>Aug</option>
                                                    <option value=8>Sep</option>
                                                    <option value=9>Oct</option>
                                                    <option value=10>Nov</option>
                                                    <option value=11>Dec</option>
                                                </select>
                                                <select id="year" onchange="jump()"></select>
                                            </div>
                                            <div id="monthAndYear" class="mt--30"></div>
        
                                            <!-- <div class="button-container-calendar">
                                                <button id="previous" onclick="previous()">&#8249;</button>
                                                <button id="next" onclick="next()">&#8250;</button>
                                            </div> -->
        
                                            <table class="table-calendar" id="calendar" data-lang="en">
                                                <thead id="thead-month"></thead>
                                                <tbody id="calendar-body"></tbody>
                                            </table>
        
        
        
                                        </div>
        
                                    </div>
                                    <!-- calender -->
                                </div>
                                <div class="search-area-calender-inner">
                                    <input type="text" placeholder="Search...">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
        
                                <!-- assignments-area saert -->
                                <div class="assignment-list-wrapper-calender">
                                    <!-- single assignments area wrapper -->
                                    <!-- single assignments area wrapper end -->
                                    <!-- single assignments area wrapper -->
                                    <div class="single-assignments-wrapper mt--50" id="randez_vous_envoye_content">
                                        
                                    </div>
                                    <!-- single assignments area wrapper end -->
                                </div>
                                <!-- assignments-area end -->
                            </div>
                            </div> 
                            
                            
</div>            
<div id="detailRandezVousModal" class="modal fade">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-body tx-center pd-y-20 pd-x-20">
                                
                                <div id="messages"></div>
                                <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                <h4 style="color: var(--color-primary); text-align: center;text-transform:uppercase;" id="titre_project"></h4>
                                </div><!-- modal-body -->
                                <div class="modal-footer" style="
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                "><a class="detail_link" id="calender_link" href="#"> 
                                    <img src="https://ssl.gstatic.com/calendar/images/dynamiclogo_2020q4/calendar_31_2x.png">
                                    Calendrier
                                </a>
                                    <a class="detail_link" id="meet_link" href="#">
                                        <img src="https://www.gstatic.com/meet/icons/logo_meet_2020q4_512dp_4ac4a724a69a35b5b08c6a711c9717c2.png">
                                    Participer</a>
                                </div>
                            </div><!-- modal-content -->
                            </div><!-- modal-dialog -->
                        </div>
                        
<script>
    window.addEventListener('load',e=>{
        createCalander((pickedDate)=>{
            

                     overlayOn()
                    $('#randez_vous_recus_content').load('<?=base_url('randezvous/getRandezVousRecusByDate')?>/'+pickedDate,(complete)=>{
                      
                        overlayOff()


                    })
                    overlayOn()
                    $('#randez_vous_envoye_content').load('<?=base_url('randezvous/getRandezVousEnvoyeByDate')?>/'+pickedDate,(complete)=>{
                      
                        overlayOff()


                    })


        })

        
    })
    function detailRandezVous(id){
            overlayOn()
        fetch(`<?=base_url("randezvous/findRandezVousById")?>/${id}`).then(r=>{
                    return r.json()
            }).then(r=>{
               
                $('#detailRandezVousModal').modal('show')
                overlayOff()
                $('#titre_project').html(r.titre)
                setHrefLink('#calender_link',r.calender_link)
                setHrefLink('#meet_link',r.meet_link)
                
                  
                
                
            })

    }
    function setHrefLink(elementId,link){
        $(`${elementId}`).attr('href',link)

    }

</script>                  