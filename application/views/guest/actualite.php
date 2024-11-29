        <style>
            @media (min-width: 576px) {
                #exampleModal-login {
                    top: 10%;
                    z-index: 1700;
                }
            }
            .modal{
                --bs-modal-width : 800px;
            }
        </style>
        <!-- theme fixed shadow -->
        <div>
            <div class="theme__shadow__circle"></div>
            <div class="theme__shadow__circle shadow__right"></div>
        </div>
        <!-- theme fixed shadow -->
        <!-- breadcrumbarea__section__start -->

        <div class="breadcrumbarea">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb__content__wraper" data-aos="fade-up">
                            <div class="breadcrumb__title">
                                <h2 class="heading">Actualité</h2>
                            </div>
                            <div class="breadcrumb__inner">
                                <ul>
                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <li>Actualité</li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="shape__icon__2">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="<?php echo base_url() ?>public/new/img/herobanner/herobanner__1.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="<?php echo base_url() ?>public/new/img/herobanner/herobanner__2.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="<?php echo base_url() ?>public/new/img/herobanner/herobanner__3.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="<?php echo base_url() ?>public/new/img/herobanner/herobanner__5.png" alt="photo">
            </div>

        </div>
        <!-- breadcrumbarea__section__end-->

        <div class="blogarea__2 sp_top_100 sp_bottom_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div id="blog__content__wraper__2" data-aos="fade-up"></div>
                        <div class="row g-5" id="content">
                    </div> <!-- This will be updated with blog content -->
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    
                        <div class="blogsidebar__content__wraper__2" data-aos="fade-up">
                            <h4 class="sidebar__title">Nouvelles récentes</h4>
                        <?php foreach($actualite as $a) {?>
                            <ul class="recent__list">
                                <li>
                                    <div class="recent__img">
                                        <a href="#">
                                            <img loading="lazy"  src="<?= base_url('assets/assets/images/' . $a['image'])  ?>" alt="sidbar">
                                        </a>
                                    </div>

                                    <div class="recent__text">
                                        <h6><a href="#"><?= $a['titre'] ?> </a></h6>
                                    </div>
                                </li>
                            </ul>
                        <? }?>
                        </div>
                        
                    </div>
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
                            <div class="thumbnail" style="display:flex;justify-content: center;;height:100%;">
                                <img id="act-image" src="#" alt="Business-Blog" style="height: 200px;  max-width: 100%;max-height: 100%;object-fit: cover;">
                            </div>
                        
                        <h4 class="title animated fadeIn" id="title" style="text-align:center"></h4>
                        
                        <p class="disc" id="extract" style="text-align:center"></p>
                        
                        <!-- quote area start -->

                        <!-- quote area end -->

                    </div>

                </div>
            </div>
        </div>
        </div>
    <script>
        function readMore(memoire_id) {
            // Show the modal
            $("#exampleModal-login").modal('show');
            fetch(`news/getActualite/${memoire_id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse the JSON response
                })
                .then(response => {
                    console.log(response);
                    // Check if the response is successful
                    if (response.success) {
                        const { titre, image, content } = response.data; // Access the data correctly
                        console.log(response); // Log the data to confirm structure
                        
                        // Update the modal content
                        $('#title').html(titre);
                        $('#extract').html(content);
                        document.querySelector('#act-image').setAttribute('src',"assets/assets/images/"+image)
                    } else {
                        console.error(response.message); // Handle error messages
                        // Optionally, show an alert or update the UI to notify the user
                    }
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }


          const spinner = document.querySelector('#blog__content__wraper__2')
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
        function createPaginationNodes(currentPage, numberOfPages) {
            // Create main pagination wrapper
            const wrapperDiv = document.createElement('div');
            wrapperDiv.className = "main__pagination__wrapper";
            wrapperDiv.setAttribute('data-aos', 'fade-up');

            // Create the unordered list for pagination
            const ul = document.createElement('ul');
            ul.className = "main__page__pagination";

            // Create the "previous" button
            const prevLi = document.createElement('li');
            const prevA = document.createElement('a');
            prevA.href = "#";
            prevA.innerHTML = `<i class="icofont-double-left"></i>`;
            if (currentPage === 1) {
                prevA.className = "disable";
            } else {
                prevA.setAttribute('onclick', `changePage(${currentPage - 1})`);
            }
            prevLi.appendChild(prevA);
            ul.appendChild(prevLi);

            // Generate page numbers
            const pages = choosePages(currentPage, numberOfPages);
            pages.forEach(p => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = "#";
                a.innerText = p.pageText;
                if (p.pageNumber === currentPage) {
                    a.className = "active";
                } else {
                    a.setAttribute('onclick', `changePage(${p.pageNumber})`);
                }
                li.appendChild(a);
                ul.appendChild(li);
            });

            // Create the "next" button
            const nextLi = document.createElement('li');
            const nextA = document.createElement('a');
            nextA.href = "#";
            nextA.innerHTML = `<i class="icofont-double-right"></i>`;
            if (currentPage === numberOfPages) {
                nextA.className = "disable";
            } else {
                nextA.setAttribute('onclick', `changePage(${currentPage + 1})`);
            }
            nextLi.appendChild(nextA);
            ul.appendChild(nextLi);

            // Append the list to the wrapper
            wrapperDiv.appendChild(ul);

            return wrapperDiv;
        }
        const changePage = (page) => {
            showHideLoader(true); // Show loader while fetching data

            fetch(`news/fetchDataNewsFront/${page}`)
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

