<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/search/search.css" rel="stylesheet">
    <script src="../../public/js/search.js"></script>

    <title>Document</title>
</head>
<body>
    <?php include __DIR__ . '/../navbar/navbar.php'?>
    <div class="container">
        <div class="search-box">
            <input placeholder="Search courses..."  type="text" class="search-input" id = "search" />
            <button type="submit" onclick="searchCourse()">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24" style="fill: #564c95;transform: ;msFilter:;">
                    <path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                </svg>
            </button>
            <select name="sort" id="sort" onchange="searchCourse()">
                <option selected value="">Sort By</option>
                <option value="title+asc">Title Asc</option>
                <option value="title+desc">Title Desc </option>
                <option value="course+asc">Newest Course</option>
                <option value="course+desc">Latest Course</option>
                <!-- <option value="participant+desc">Total Participant Desc</option>
                <option value="participant+asc">Total Participant Asc</option> -->
            </select>
            <select name="filter">
                <option value="">Free</option>
                <option value="">Need Password</option>
            </select>
        </div> 
        <div class="card-container">
            <div class="cards grid-row" id="result-container">

            </div>
        </div>
        <div class="paging">
            <div class="pagination" id="pagination">

        </div>
        </div>
    </div>
    
</body>
</html>