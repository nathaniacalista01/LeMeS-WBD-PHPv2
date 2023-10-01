<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Course</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <link rel="stylesheet" href="../../public/css/course-detail/course-detail.css">
        <link rel="stylesheet" href="../../public/css/course-detail/color-1.css">
    </head>
    <body>
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
                                                    Types <span>2 lessons | 20min</span>
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

                            <div class="tab-pane fade show active" id="course-teacher" role="tabpanel"
                            aria-labelledby="course-teacher-tab">
                                <div class="course-instructor box">
                                    <h3 class="mb-3 text capitalize">Teacher</h3>
                                    <div class="teacher-details">
                                        <div class="details-wrap">
                                            <div class="left-box">
                                                <div class="right-box">
                                                    <div class="img-box">
                                                        <!-- <img src=" -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="course-reviews" role="tabpanel"
                            aria-labelledby="course-reviews-tab">
                                Reviews
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- course sidebar -->
                        <div class="course-sidebar box">
                            course sidebar
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>