<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Course Detail</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <link rel="stylesheet" href="../../public/css/course-detail/course-detail.css">
        <link rel="stylesheet" href="../../public/css/course-detail/bootstrap.min.css">
        <link rel="stylesheet" href="../../public/css/course-detail/font-awesome.css">
        <link rel="stylesheet" class="js-color-style" href="../../public/css/course-detail/color-1.css">
    </head>
    <body>
        <div class="main-wrapper">
           <header class="header">
            <div class="container">
                <div class="header-main d-flex justify-content-between align-items-center">
                    <div class="header-logo">
                        <a href="../../views/course-detail/index.php"><span>Edu</span>care</a>
                    </div>
                    <button type="button" class="header-hamburger-btn js-header-menu-toggler">
                        <span></span>
                    </button>
                    <div class="header-backdrop js-header-backdrop"></div>
                    <nav class="header-menu js-header-menu">
                        <button type="button" class="header-close-btn js-header-menu-toggler">
                            <i class="fas fa-times"></i>
                        </button>
                        <ul class="menu">
                            <li class="menu-item"><a href="../../views/course-detail/index.php">Home</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">courses <i class="fas fa-chevron down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="">course</a></li>
                                    <li class="sub-menu-item"><a href="">course detail</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">pages <i class="fas fa-chevron down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="../../views/login/index.php">log in</a></li>
                                    <li class="sub-menu-item"><a href="../../views/login/index.php">sign up</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
           </header> 
        </div>
        <!-- <section class="banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner-text">
                            <h2></h2>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </section> -->
        <section class="course-detail section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- course header -->
                        <div class="course-header box">
                            <h2 class="text-capitalize">Course</h2>
                            <div class="rating">
                                <span class="average-rating">(4.5)</span>
                                <span class="average-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </span>
                                <span class="reviews">(230 Reviews)</span>
                            </div>
                            <ul>
                                <li>enrolled students - <span>2200</span></li>
                                <li>created by - <span><a href="#">Teacher</a></span></li>
                                <li>last updated - <span>01/10/2023</span></li>
                            </ul>
                        </div>

                        <nav class="course-tabs">
                            <div class="nav nav-tabs broder-0" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="course-curriculum-tab" data-bs-toggle="tab"
                                data-bs-target="#course-curriculum" type="button" role="tab" 
                                aria-controls="course-curriculum" aria-selected="true">Curriculum</button>
                                <button class="nav-link" id="course-description-tab" data-bs-toggle="tab"
                                data-bs-target="#course-description" type="button" role="tab" 
                                aria-controls="course-description" aria-selected="false">Description</button>
                                <button class="nav-link" id="course-teacher-tab" data-bs-toggle="tab"
                                data-bs-target="#course-teacher" type="button" role="tab" 
                                aria-controls="course-teacher" aria-selected="false">Teacher</button>
                                <button class="nav-link" id="course-reviews-tab" data-bs-toggle="tab"
                                data-bs-target="#course-reviews" type="button" role="tab" 
                                aria-controls="course-reviews" aria-selected="false">Reviews</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">

                            <!-- course currriculum start -->
                            <div class="tab-pane fade" id="course-curriculum" role="tabpanel"
                            aria-labelledby="course-curriculum-tab">
                                <div class="course-curriculum box">
                                    <h3 class="text-capitalize mb-4">Course Curriculum</h3>
                                    
                                    <div class="accordion" id="accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                    Language basics <span>2 lessons | 20min</span>
                                                </button>
                                            </h2>
                                            <div id="collapse-1" class="accordion-collapse collapse show"
                                            aria-labelledby="heading-1" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Lexical structure
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Values
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Types
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Variables
                                                            <span>06:00</span>
                                                        </li>
                                                    </ul> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-2">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                    Types <span>2 lessons | 20min</span>
                                                </button>
                                            </h2>
                                            <div id="collapse-2" class="accordion-collapse collapse"
                                            aria-labelledby="heading-2" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Strings
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Booleans
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Null and Undefined
                                                            <span>06:00</span>
                                                        </li>
                                                    </ul>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-3">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Control structure <span>2 lessons | 20min</span>
                                                </button>
                                            </h2>
                                            <div id="collapse-3" class="accordion-collapse collapse"
                                            aria-labelledby="heading-3" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            If / else
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Switch
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Loops
                                                            <span>06:00</span>
                                                        </li>
                                                    </ul>   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-4">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                    Function <span>2 lessons | 20min</span>
                                                </button>
                                            </h2>
                                            <div id="collapse-4" class="accordion-collapse collapse"
                                            aria-labelledby="heading-4" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Arrow
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Parameters
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Return Values
                                                            <span>06:00</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-play-circle"></i>
                                                            Recursion
                                                            <span>06:00</span>
                                                        </li>
                                                    </ul> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="course-description" role="tabpanel"
                            aria-labelledby="course-description-tab">
                                <div class="course-description box">
                                    <h3 class="text-capitalize mb-4">Description</h3>
                                    <p>lorem ipsum</p>
                                    
                                </div>
                            </div>

                            <div class="tab-pane fade" id="course-teacher" role="tabpanel"
                            aria-labelledby="course-teacher-tab">
                                <div class="course-teacher box">
                                    <h3 class="mb-3 text capitalize">Teacher</h3>
                                    <div class="teacher-details">
                                        <div class="details-wrap d-flex align-items-center flex-wrap">
                                            <div class="left-box me-4">
                                                <div class="img-box">
                                                    <img src="../../public/asset/1.png" class="rounded-circle" alt="teacher img">
                                                </div>
                                            </div>
                                                <div class="right-box">
                                                    <h4> John Doe <span>(Teacher)</span></h4>
                                                    <ul>
                                                        <li><i class="fas fa-star"></i> 4.5 Rating</li>
                                                        <li><i class="fas fa-play-circle"></i> 10 Courses</li>
                                                        <li><i class="fas fa-certificate"></i> 3000 Reviews</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <p class="mb-0">lorem ipsum</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="course-reviews" role="tabpanel"
                            aria-labelledby="course-reviews-tab">
                                <div class="course-reviews box">
                                    <div class="rating-summary">
                                        <h3 class="mb-4 text-capitalize">students feedback</h3>
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center justify-content-center
                                            text-center">
                                                <div class="rating-box">
                                                    <div class="average-rating">
                                                        <div class="average-stars">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <div class="reviews">230 Reviews</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="rating-bars">
                                                            <div class="rating-bars-item">
                                                                <div class="star-text">5 Star</div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 50%;"></div>
                                                                    </div>
                                                                        <div class="percent">50%</div>
                                                            </div>
                                                            <div class="rating-bars-item">
                                                                <div class="star-text">4 Star</div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 30%;"></div>
                                                                    </div>
                                                                        <div class="percent">30%</div>
                                                            </div>
                                                            <div class="rating-bars-item">
                                                                <div class="star-text">3 Star</div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 10%;"></div>
                                                                    </div>
                                                                        <div class="percent">10%</div>
                                                            </div>
                                                            <div class="rating-bars-item">
                                                                <div class="star-text">2 Star</div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 7%;"></div>
                                                                    </div>
                                                                        <div class="percent">7%</div>
                                                            </div>
                                                            <div class="rating-bars-item">
                                                                <div class="star-text">1 Star</div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 3%;"></div>
                                                                    </div>
                                                                        <div class="percent">3%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reviews-list">
                                                <div class="reviews-item">
                                                    <div class="img-box">
                                                        <img src="../../public/asset/1.png" alt="review img">
                                                    </div>
                                                    <h4>John Doe</h4>
                                                    <div class="stars-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span class="date">1 week ago</span>
                                                    </div>
                                                    <p>Great work. I understand this subject.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- course sidebar -->
                        <div class="course-sidebar box">
                            <div class="img-box">
                                <!-- <img src="" -->
                            </div>
                            <div class="price"></div>
                            <h3></h3>
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../public/js/bootstrap.bundle.min.js"></script>  
    </body>
</html>