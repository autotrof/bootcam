<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    INI VIEW DARI CONTROLLER
    <div id="app">
        ${ message }
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.3.4/vue.cjs.js" integrity="sha512-Om0T2d9tl4H2ShSsEkWjJeQOlXGJg4OZvXKZw075refp2RNZ1avQDbqd6WhwGbWhqpcn2oPmExCEa/lSLzZaJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const { createApp } = Vue
        const app = createApp({
            delimiters: ["${", "}$"],
            compilerOptions: {
                delimiters: ["${", "}$"]
            },
            data() {
                return {
                    message: 'Hello Vue!'
                }
            }
        })
        app.mount('#app')

    </script>
</body>
</html>
