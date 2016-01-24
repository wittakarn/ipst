jQuery.extend(jQuery.validator.messages, {
    required: "ข้อมูลต้องระบุ",
    remote: "Please fix this field.",
    email: "กรุณากรอก Email ให้ถูกต้อง.",
    url: "Please enter a valid URL.",
    date: "กรุณาใส่วันที่ให้ถูกต้อง.",
    dateISO: "Please enter a valid date (ISO).",
    number: "กรุณากรอกเป็นตัวเลขหรือทศนิยมท่านั้น.",
    digits: "กรุณากรอกเป็นจำนวนเต็มเท่านั้น.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("กรุณาระบุตัวเลขอย่างไม่เกิน {0} ตัว."),
    minlength: jQuery.validator.format("กรุณาระบุตัวเลขไม่น้อยกว่า {0} ตัว."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});