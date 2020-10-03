window.onload = function() {
    // регистрация
    let reg_form = document.querySelector("#reg-form")
    reg_form.addEventListener("submit", async function(e) {
        e.preventDefault()
        
        let data = {
            name: validation("#reg_name", /^[\w\d]{2,100}/),
            login: validation("#reg_login", /^[\w\d]{6,100}/),
            email: document.querySelector("#reg_email input").value,
            password: validation("#reg_pass", /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/),
            confirm_password: confirmate_pass("#reg_pass", "#reg_conf_pass"),
        }
        
        let response = await fetch('registration.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        let res_data = await response.json()

        if (response.ok) {
            alert(res_data)
            document.location.href = "secret.php"
        } else {
            document.querySelector("#reg-form .error-message").innerText = res_data[0];
        }
    })


    // авторизация
    let log_form = document.querySelector("#login-form")
    log_form.addEventListener("submit", async function(e){
        e.preventDefault()

        let data = {
            login: validation("#log_login", /^[\w\d]{6,100}/),
            password: validation("#log_pass", /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/),
        }

        let response = await fetch('login.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        let res_data = await response.json()

        if (response.ok) {
            alert(res_data)
            document.location.href = "secret.php"
        } else {
            document.querySelector("#login-form .error-message").innerText = res_data;
        }
    })
}



function validation (selector, regex) {
    let text = document.querySelector(selector + "> input").value
    let error_badge = document.querySelector(selector + "> .error")

    if (regex.test(text)) {
        error_badge.classList.remove("error--show")
        return text
    } else {
        error_badge.classList.add("error--show")
        return undefined
    }
}



function confirmate_pass(pass_, pass2_) {
    let pass = document.querySelector(pass_ + "> input").value
    let pass2 = document.querySelector(pass2_ + "> input").value
    let error_badge = document.querySelector(pass2_ + "> .error")

    if (pass === pass2) {
        error_badge.classList.remove("error--show")
        return pass2
    } else {
        error_badge.classList.add("error--show")
        return undefined
    }
}
