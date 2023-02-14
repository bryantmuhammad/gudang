const CORE = {
    baseUrl : window.location.origin,
    crsfToken : document.head.querySelector("[name~=csrf-token][content]").content
}
