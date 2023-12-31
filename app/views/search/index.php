<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/components/pagination.css" rel="stylesheet">
    <link href="../../public/css/home/home.css" rel="stylesheet">
    <link href="../../public/css/search/search.css" rel="stylesheet">

    <script src="../../public/js/debounce.js"></script>
    <script src="../../public/js/home.js"></script>
    <script src="../../public/js/search.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include __DIR__ . '/../navbar/navbar.php'?>
    <div class="container">
        <div class="search-box">
            <input placeholder="Search courses..."  type="text" onkeyup="searchWithDebounce()" class="search-input" id = "search" />
            <button type="submit" onclick="searchCourse()" class="search-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24" style="transform: ;msFilter:;">
                    <path fill= "#564c95" d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                </svg>
            </button>
        </div> 
        <div class="sort-filter-container">
            <select class="sort"name="sort" id="sort"  onchange="searchCourse()">
                <option selected value="">Sort By</option>
                <option value="title+asc">Title Asc</option>
                <option value="title+desc">Title Desc </option>
                <option value="course+desc">Newest Course</option>
                <option value="course+asc">Latest Course</option>
            </select>
            <select class="filter" name="course_password" id="course_password" onchange="searchCourse()">
                <option selected value="">Filter By Password</option>
                <option value="free">Free</option>
                <option value="required">Need Password</option>
            </select>
            <select class="filter" name="release_year" id="release_year" onchange="searchCourse()">
                <option selected value="">Filter By Year</option>
                <option value="2021-now">2021 - Now</option>
                <option value="2019-2021">2019 - 2021</option>
                <option value="2016 - 2018">2016 - 2018</option>
                <option value="<2016">Before 2016</option>
            </select>
        </div>
        
        <div class="card-container">
            <div class="cards grid-row" id="result-container">
            </div>
        </div>
        <?php include __DIR__ . "/../components/courseModal.php" ?>
        <div class="paging">
            <div class="pagination" id="pagination">

        </div>
        </div>
    </div>
    
</body>
</html>