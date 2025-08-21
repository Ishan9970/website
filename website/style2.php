* {
    margin: 0;
    padding: 0;
    font-family: 'Muli', sans-serif;
    box-sizing: border-box;
}

body {
    background: url('images/bg1.jpg') center/cover no-repeat fixed;
}

.card {
    margin-top: 100px;
    background: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
}

.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}

.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;
    z-index: 2;
}

.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D !important;
    color: #fff !important;
}

.btn-gmail {
    background-color: #ea4335 !important;
    color: #fff !important;
}
