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
    .single {
    margin-right: 30px;
    min-width: max-content;
}

@media (min-width: 576px) {
    #exampleModal-login {
        top: 10%;
    }
}

@media (min-width: 576px) {
    .modal-dialog {
        max-width: 50vw !important;
        margin: 1.75rem auto;
    }
}
.thumbnail img {
    width: 100%; /* Ensure the image takes full width of the thumbnail */
    height: auto; /* Maintain aspect ratio */
}
</style>
<div class="rts-bread-crumbarea-1 rts-section-gap bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main-wrapper">
                        <h1 class="title">Événement</h1>
                        <!-- breadcrumb pagination area -->
                        <div class="pagination-wrapper">
                            <a href="/">Acceuil</a>
                            <i class="fa-regular fa-chevron-right"></i>
                            <a class="active" href="#">Événement</a>
                            
                        </div>
                        <!-- breadcrumb pagination area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bread crumb area end -->


    <!-- blog details area start -->
    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- rts blo post area -->
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    
                    <div class="loadingholder" id="loadingholder"
                        style="display:flex;align-items:center;justify-content:center">
                        <div class="loading"></div>
                    </div>
                    <div class="row g-5" id="content">
                    </div>
                    
                </div>
                <!-- rts-blog post end area -->
                <!--rts blog wizered area -->
                <div class="col-xl-4 col-md-12 col-sm-12 col-12 rts-sticky-column-item">
                    <div class="blog-sidebar theiaStickySidebar">
                        <!-- single wizered start -->
                        <div class="rts-single-wized Recent-post">
                            <div class="wized-header">
                                <h5 class="title">
                                    Événements récents
                                </h5>
                            </div>
                            <?php foreach($evenement as $e) {?>
                                <div class="wized-body" >
                                <!-- recent-post -->
                                
                                <!-- recent-post End -->
                                <!-- recent-post -->
                                <div class="recent-post-single">
                                    <div class="thumbnail">
                                        <a ><img src="<?= $e['photo']  ?>" alt="Blog_post"></a>
                                    </div>
                                    <div class="content-area text-start">
                                        
                                        <a class="post-title" href="#">
                                            <h6 class="title"><?= $e['nom'] ?></h6>
                                        </a>
                                    </div>
                                </div>
                               
                            </div>
                                
                                
                                <? }?>
                        </div>
                        <!-- single wizered End -->
                        <!-- single wizered start -->
                        <!-- single wizered End -->
                    </div>
                </div>
                <!-- rts- blog wizered end area -->
            </div>
        </div>
    </div>
    <div class="modal login-pupup-modal fade" id="exampleModal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="transform: none;">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="transform: none;">
                    <div class="blog-listing-content">
                            <div class="single" style="margin-bottom: 20px">
                                <i class="far fa-clock"></i>
                                <span>Date fin : </span><span id="date_fin"></span> <span> à 23:59:59</span>
                            </div>
                        
                            <div class="thumbnail" style="display:flex;justify-content: center;;height:100%;">
                                <img id="act-image" src="#" alt="Business-Blog" style="height: 200px;  max-width: 100%;max-height: 100%;object-fit: cover;">
                            </div>
                        
                        <h3 class="title animated fadeIn" id="title" style="text-align:center"></h3>
                        <p style="text-align:center">
                        </p>
                        <p class="disc" id="extract" style="text-align:center">
                            
                        </p>
                        <!-- quote area start -->

                        <!-- quote area end -->

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- blog details area end -->

    <!-- footer call to action area start -->
   
    <script>
        function readMore(evenement_id) {
            // Show the modal
            $("#exampleModal-login").modal('show');

            fetch(`news/getEvenement/${evenement_id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse the JSON response
                })
                .then(data => {
                    console.log('response ', data)
              
                    const { nom, date_fin, photo, description } = data; // Access the data correctly
                        // Log the data to confirm structure
                    // Update the modal content
                    $('#title').html(nom);
                    $('#date_fin').html(date_fin);
                    $('#extract').html(description);
                    $('#act-image').attr('src', photo); // Make sure this is correct
                   
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }


         const spinner = document.querySelector('#loadingholder')
        const content = document.querySelector('#content')
        const showHideLoader = (show) => {
            if (show) {
                spinner.style.display = "block"
                content.style.display = "none"
            }
            else {
                spinner.style.display = "none"
                content.style.display = "block"

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
            const div = document.createElement('div')
        div.className = "col-lg-12"
        const childDiv = document.createElement('div')
        childDiv.className = "rts-elevate-pagination"
        const ul = document.createElement('ul')
        ul.className = "justify-content-start"
        const pages = choosePages(currentPage, numberOfPages)
        pages.forEach(p => {
            const li = document.createElement('li')
            const button = document.createElement('button')
            if (p.pageNumber == currentPage) {
                button.className = "active"
            }
            button.innerHTML = p.pageText
            button.setAttribute('onclick', `changePage(${p.pageNumber})`)
            li.appendChild(button)
            ul.appendChild(li)
        })
        childDiv.appendChild(ul)
        div.appendChild(childDiv)
        return div
        }
        
        const changePage = (page) => {
            showHideLoader(true); // Show loader while fetching data

            fetch(`news/fetchEvenementDispo/${page}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse JSON response
                })
                .then((response) => {
                    showHideLoader(false); // Hide loader after data is fetched

                    // Update the content with the fetched HTML
                    document.getElementById('content').innerHTML = response.html;

                    const { numberOfPages, currentPage } = response;
                    const paginationNodes = createPaginationNodes(parseInt(currentPage), parseInt(numberOfPages));
                    document.getElementById('content').appendChild(paginationNodes); // Ensure you append to the right element
                })
                .catch((error) => {
                    console.error('There was a problem with the fetch operation:', error);
                    showHideLoader(false); // Hide loader in case of an error
                });
        };


     
       



    </script>

    