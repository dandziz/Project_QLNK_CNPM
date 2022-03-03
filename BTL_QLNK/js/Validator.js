function Validator(options) {
    function getParent(element, selector) {
        while(element.parentElement) {
            if(element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }   

    var formElement = document.querySelector(options.form);//Lấy element của form

    var selectorRules = {}; //Tạo 1 object rule để lưu tất cả các rule cho từng input (trường hợp 1 input có nhiều rule)

    var validate = function(inputElement, rule, messElement) {   //Hàm xử lý khi blur
        var errorMessage;
        //Lấy ra các rules của selector đó
        var rules = selectorRules[rule.selector];

        for(var i=0; i<rules.length; i++) {
            switch(inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked')
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }

            if(errorMessage) {
                break;
            }
        }

        if(errorMessage) {
            messElement.innerText = errorMessage; //Trường hợp chưa nhập gì sẽ trả ra lỗi
            getParent(inputElement, options.formGroupSelector).classList.add('invalid');
        }
        else {  //Trường hợp có nhập sẽ trả ra chuỗi rỗng
            messElement.innerText = '';
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
        }

        return !errorMessage;
    }

    var validateEmail = function(inputElement, messElement) {
        var parentElement =  getParent(inputElement, options.formGroupSelector);
        messElement.innerText = '';
        parentElement.classList.remove('invalid');
    }


    if(formElement) {
        //Khi submits form
        formElement.onsubmit = function(e) {
            e.preventDefault();

            var isFormValid = true;

            options.rules.forEach(rule => {
                var inputElement = formElement.querySelectorAll(rule.selector);
                Array.from(inputElement).forEach(function(inputElement) {
                    var messElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                    var isValid = validate(inputElement, rule, messElement);
                    
                    if(!isValid) {
                        isFormValid = false;
                    }
                })                
            })

            var enableInput = formElement.querySelectorAll('[name]:not([disabled])');//Trả về 1 NodeList

            if(isFormValid) {
                //Trường hợp submits với JS
                if(typeof options.onSubmit === 'function') {
                    var formValues = Array.from(enableInput).reduce(function(values, input) {//Array.from dùng để chuyển NodeList => mảng
                        switch (input.type) {
                            case 'checkbox':
                            case 'radio':
                                if(input.matches(':checked')) {
                                    values[input.name] = formElement.querySelector(`input[name='${input.name}']:checked`).value;
                                }
                                else {
                                    values[input.name] = '';
                                }
                                break;
                            default:
                                values[input.name] = input.value;

                        }
                        return values;
                    }, {});

                    options.onSubmit(formValues);
                }
                //Submit với hành vi mặc định
                else {
                    formElement.submit();
                }
            }
        }
        

        options.rules.forEach(rule => {

            if(Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);  //Thành mảng rồi thì nhảy lên đây và gán thêm thằng rule thứ 2 vào
            }
            else {
                selectorRules[rule.selector] = [rule.test]; 
                /* Logic là nếu selector không phải là mảng thì sẽ biến nó thành mảng để có thể gán thêm 1 rule thứ 2 vào
                Ban đầu nó là object nên chắc chắn rơi vào đây, nhưng nếu để nguyên object thì rule 2 nó sẽ ghi đè rule 1
                vì có cùng key trong 1 mảng
                */
            }

            var inputElement = formElement.querySelectorAll(rule.selector);

            Array.from(inputElement).forEach(function (inputElement) {
                var messElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);

                //Xử lý khi blur ra ngoài
                inputElement.addEventListener('blur', () => {  

                    validate(inputElement, rule, messElement);
                        
                    }
                );

                //Xử lý khi người dùng gõ
                inputElement.addEventListener('input', () => {

                    validateEmail(inputElement, messElement);
                    
                })
            })
        });
    }
}

//Định nghĩa các Rules
Validator.isRequired = function(selector, message) {    //function cũng là 1 Object nên ta có thể tạo phương thức cho function như này
    //Bắt buộc phải có nhập
    return {
        selector: selector,
        test: function(value) {  //Nguyên tắc: nếu có lỗi thì trả về 1 message, không có thì không trả về cái gì (undefined)
            return value ? undefined : message || 'Vui lòng nhập đủ thông tin'; //trim để loại bỏ khoảng cách, tránh trường hợp người dùng nhập toàn cách
        }
    };
}

Validator.isEmail = function(selector,message) {
    //Bắt buộc phải là email
    return {
        selector: selector,
        test: function(value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'vui lòng nhập email của bạn';   //Dùng regex để kiểm tra value có phải email không
        }
    };
}

Validator.minLenght = function(selector, min, message) {
    //Bắt buộc phải là email
    return {
        selector: selector,
        test: function(value) {
            return value.length >= min ? undefined : message || `vui lòng nhập nhiều hơn ${min} ký tự`;   //Kiểm tra độ dài password không
        }
    };
}

Validator.isConfirm = function(selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function(value) {
            return value === getConfirmValue() ? undefined : message || 'Giá trị trường này không chính xác';
        }
    }
}