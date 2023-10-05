<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/course-detail/addModule.css">
    <script src="../../public/js/addModule.js"></script>
</head>
<body>
    <div class="overlay-module"></div>
    <button onclick="openModuleForm()">open form</button>
    <div class="addModule-container">
        <div class="addForm">
            <div class="addForm-header">
                Add Module
            </div>
            <div class="addForm-element">
                <label for="moduleName">Module Name</label>
                <input type="text" id="moduleName">
            </div>
            <div class="addForm-element">
                <label for="upload">Upload File(s)</label>
                <input type="file" id="upload" multiple>
            </div>
            <div class="addForm-element">
                <div class="buttons-module">
                    <button onclick="closeModuleForm()">Cancel</button>
                    <button>Save</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>