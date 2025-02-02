axios.defaults.withCredentials = true;
console.log(axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

const token = localStorage.getItem("auth_token");
console.log("Token alınan değer:", token);
if (token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    console.log("Axios Authorization Header:", axios.defaults.headers.common["Authorization"]);
    
    

} else {
    console.error("Token bulunamadı!");
}