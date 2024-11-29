<style>
    .loading {
        display: inline-block;
        width: 50px;
        height: 50px;
        border: 3px solid rgba(255, 255, 255, .3);
        border-radius: 50%;
        border-top-color: blue;
        animation: spin 1s ease-in-out infinite;
        -webkit-animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            -webkit-transform: rotate(360deg);
        }
    }

    @-webkit-keyframes spin {
        to {
            -webkit-transform: rotate(360deg);
        }
    }
</style>
<div class="rts-bread-crumbarea-1 rts-section-gap bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main-wrapper">
                        <h1 class="title">Nos Capsules Videos</h1>
                        <!-- breadcrumb pagination area -->
                        <div class="pagination-wrapper">
                            <a href="/">Acceuil</a>
                            <i class="fa-regular fa-chevron-right"></i>
                            <a class="active" href="#">Nos Capsules Videos</a>
                        </div>
                        <!-- breadcrumb pagination area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bread crumb area end -->




    <div class="rts-course-top-rating-filter-area rts-section-gap">
        <div class="container">
        <!--<div class="row">
                <div class="col-lg-12">
                    <div class="filter-small-top-full">
                        <div class="left-filter">
                            <span>Short By</span>
                            <select class="nice-select" name="price">
                                <option>All Category</option>
                                <option value="asc">Design</option>
                                <option value="desc">Development</option>
                                <option value="pop">Popularity</option>
                                <option value="low">Price</option>
                                <option value="high">Stars</option>
                            </select>
                        </div>
                        <div class="right-filter">
                            <span>Showing 1-9 of 19 results</span>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link discover-filter-button discover-filter-activation">
                                        <i class="fa-regular fa-filter"></i>
                                        <span>Filter</span>
                                    </button>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>-->
            <div class="row mt--30">
                <div class="col-lg-12">
                    
                </div>
            </div>
            <div class="loadingholder" id="loadingholder"
                        style="display:flex;align-items:center;justify-content:center">
                        <div class="loading"></div>
            </div>
            <div class="row mt--0 g-5" id="content">
                
                
            </div>
            <div class="row mt--30">
                <div class="col-lg-12">
                    <!-- rts-pagination-area -->
                    <div class="rts-pagination-area-2">
                        <ul id="pagination-capsules">
                        </ul>
                    </div>
                    <!-- rts-pagination-area end -->
                </div>
            </div>
        </div>
    </div>
<script>
        const  refreshEvents = ()=>{
            document.querySelectorAll('.play-youtube').forEach(player => {
        console.log(player)
    player.addEventListener('click', e => {
        e.preventDefault()
        const video_id = player.dataset.vid
        $.magnificPopup.open({
            items: {
                src: `https://www.youtube.com/watch?v=${video_id}`,
                type: 'iframe'
            },


        })


    })



})
        }
        const spinner = document.querySelector('#loadingholder')
        const content = document.querySelector('#content')
        const showHideLoader = (show) => {
            if (show) {
                spinner.style.display = "block"
            }
            else {
                spinner.style.display = "none"
               
            }
        }
         showHideLoader(true)
        setTimeout(() => {
            changePage(1)
            
        }, 1000)
        function choosePages(currentPage,numberOfPages){
            let pages = [{
                pageNumber:1,
                pageText:'1'
            }]
            if(currentPage==2){
                pages.push({
                    pageNumber:2,
                    pageText:'2'
                })
            }
            else if((currentPage-1)>1){
                pages.push({
                    pageNumber:2,
                    pageText:'..'
                })
                pages.push({
                    pageNumber:currentPage,
                    pageText:`${currentPage}`
                })
            }
            if(numberOfPages-currentPage==1){
                pages.push({
                    pageNumber:numberOfPages,
                    pageText:`${numberOfPages}`
                })
                
            }
            else if(numberOfPages-currentPage>1){
                pages.push({
                    pageNumber:currentPage+1,
                    pageText:`..`
                })
                pages.push({
                    pageNumber:numberOfPages,
                    pageText:`${numberOfPages}`
                })
            }
            return pages


        }
        function createPaginationNodes(currentPage,numberOfPages){
         
         const ul = document.querySelector('#pagination-capsules')
            ul.innerHTML=""
         const pages = choosePages(currentPage, numberOfPages)
        pages.forEach(p => {
            
            const li = document.createElement('li')
            li.setAttribute('data-page',p.pageNumber)
            li.addEventListener('click',(e)=>{
                const clickedPage = li.dataset.page
                changePage(clickedPage)


            })
            if (p.pageNumber == currentPage) {
                li.className = "active"
            }
            li.innerHTML = p.pageText
            ul.appendChild(li)
        })
        return 
}
        
const changePage=(page)=>{
    showHideLoader(true)
    $.ajax({
    url: 'capsules/fetchDataCapsulesFront/'+page,
    type: 'GET',
    dataType: 'json',
    success: function (response) {
        showHideLoader(false)
        
        $('#content').html(response.html)
        const { numberOfPages, currentPage } = response
        createPaginationNodes(parseInt(currentPage),parseInt(numberOfPages))
        refreshEvents()
        //content.appendChild(paginationNodes)
    }

    });
}


</script>
<script>
    console.log('why are you not working')
    
</script>