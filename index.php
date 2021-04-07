<html>
    <head>
        <title>PHP FORM VALIDATION</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
            #app{
                margin-top:25vh;
            }
            .contact-form{
                background:#e4ded7;
                padding-top:15px;
                padding-bottom:15px;
            }
        </style>
    </head>
    <body>
        
        
        <div class="container" id="app"> 
            <div class="row ">
                <div class="col-md-8 mx-auto contact-form">
                    <form>
                        <div>
                            <label >Name *</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input v-model="firstName" type="text" class="form-control" id="inputFirstname" placeholder="First name">
                                <label for="inputFirstname">First name</label>

                            </div>
                            <div class="col-sm-6">
                                <input v-model="lastName" type="text" class="form-control" id="inputLastname" placeholder="Last name">
                                <label for="inputLastname">Last name</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="inputEmail">Email *</label>
                                <input v-model="email" type="text" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="inputPhone">Contact Phone Number *</label>
                                <input type="text" v-model="phoneNumber" class="form-control" id="inputPhone" placeholder="">
                            </div>
                        </div>

                        <div class="row" v-if="showErr">
                            <div class="col-sm-12">
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <li v-for="error in errors">{{ error }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">
                            <div class="col text-center">
                                <button style="background:#ba9444;border:0px;margin-top:8px;" type="button" class="btn btn-primary" v-on:click.prevent="validateForm">Get Me on the List!</button>
                            <div>
                        </div>
                        
                </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
        var app = new Vue({
            el: '#app',
            data: {
                errors:[],
                firstName:"",
                lastName:"",
                email:"",
                phoneNumber:"",
                
            },
            computed:{
                showErr: function(){
                    return this.errors.length > 0;
                }
            },
            methods:{
                validateForm: function(e){

                    this.errors=[];


                    //name validation
                    if(this.firstName.length===0)
                        this.errors.push('Firstname must not be empty');
                    
                    if(this.lastName.length===0)
                        this.errors.push('Lastname must not be empty');

                    //email validation
                    let re = /\S+@\S+\.\S+/;
                    if(!re.test(this.email)) this.errors.push('Enter valid email address');

                    //phone number validation
                    re = /^\d{10}$/;
                    if(!re.test(this.phoneNumber)) this.errors.push('10 digits phone number required');



                }
            }
        })
        </script>
    </body>
</html>