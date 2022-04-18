let [month, date, year] = new Date().toLocaleDateString("en-US").split("/");

const dob = document.querySelector('#DOB')
const age = document.querySelector('#AGE')

const marital_status = document.querySelector('#MARITAL-STATUS')


dob.addEventListener('change', (e) => {
    const inputDate = e.target.value
    const inputYear = inputDate.split('-')[0]
    const inputMonth = inputDate.split('-')[1]

    
    let userAge = 0
    if (inputMonth > month ){
        userAge = year - inputYear - 1
        
    }else{
        userAge = year - inputYear

    }

    age.value = userAge

    if (userAge < 18) {
        marital_status.setAttribute("disabled", "disabled")
    }else{
        marital_status.removeAttribute("disabled")
    }

})




