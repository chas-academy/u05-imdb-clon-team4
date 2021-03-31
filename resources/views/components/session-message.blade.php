<script defer>
function timeout() {
    const item = document.querySelector('.message');
    setTimeout(()=>{
        item.style.display="none"
    },5000)
}
console.log(timeout());
</script>
