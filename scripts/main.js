'use strict'
document.addEventListener('DOMContentLoaded', e => {
    let date = new Date()
    const year = date.getFullYear()
    let yearContent = document.querySelector('#year')
    yearContent.innerHTML = year

    // Change the typed value of the first letter to uppercase for input fields and lowercase for email fields
    document.querySelector('#mediaHouseName').onchange = e => {
        let val = document.querySelector('#mediaHouseName').value
        RegExp = /\b[a-z]/g

        val = val.charAt(0).toUpperCase() + val.substr(1)
    }

    document.querySelector('#mediaHouseEmail').onchange = e => {
        let val = document.querySelector('#mediaHouseEmail').value
        RegExp = /\b[a-z]/g

        val = val.toLowerCase()
    }

    document.querySelector('#contactPersonName').onchange = e => {
        let val = document.querySelector('#contactPersonName').value
        RegExp = /\b[a-z]/g

        val = val.charAt(0).toUpperCase() + val.substr(1)
    }

    document.querySelector('#contactPersonEmail').onchange = e => {
        let val = document.querySelector('#contactPersonEmail').value
        RegExp = /\b[a-z]/g

        val = val.toLowerCase()
    }


    const form = document.querySelector('form')
    // On Form Submit
    form.addEventListener('submit', e => {
        let forms = document.getElementsByClassName('needs-validation')
        // Check to see if form has validation errors
        let validation = Array.prototype.filter.call(forms, (form) => {
            if (form.checkValidity() === false) {
                e.preventDefault()
                e.stopPropagation()
            }
            form.classList.add('was-validated')
        })


        // If form doesn't have validation errors
        if (form.checkValidity() === true) {
            e.preventDefault()

            // change the button color and add the loading class
            document.querySelector('button').classList.remove('btn-danger')
            document.querySelector('button').classList.add('btn-primary')
            document.querySelector('button').innerHTML =
                'Loading <span class="spinner"></span><i class="fa fa-spinner fa-spin"></i></span>'

            const formdata = new FormData(form)

            // initiate a fetch call
            fetch('scripts/processor.php', {
                    method: 'post',
                    body: formdata
                })
                .then(response => {
                    return response.json()
                })
                .then(data => {
                    if (data === 'user_exists') {
                        swal('Already Accredited!', 'Your Media House is already accredited.', 'warning')
                        setTimeout(() => {
                            window.location = 'https://awlo.org/awlc/inviteafriend'
                        }, 3000)
                    } else
                    if (data === 'success') {
                        swal('Accreditation Successful', 'Your accrediation was successful!', 'success')
                        setTimeout(function () {
                            window.location = 'https://awlo.org/awlc/inviteafriend'
                        }, 3000)
                    }
                })
                .catch(error => {
                    console.log('The Request Failed', error)
                })
        }
    })
})

