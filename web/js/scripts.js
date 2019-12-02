function showInputCompanyAndTin() {
  document.getElementById('divCompany').style.display = 'block';
  document.getElementById('divTin').style.display = 'block';
}

function hideInputCompanyAndTin() {
  document.getElementById('divCompany').style.display = 'none';
  document.getElementById('divTin').style.display = 'none';
}

function showInputTin() {
    document.getElementById('divTin').style.display = 'block';
    document.getElementById('divCompany').style.display = 'none';
}
