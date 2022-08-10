
<?php $__env->startSection('title'); ?>
פרופיל המותג
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body register">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <strong>לא מאומת. אנא המתן <?php echo e($brand_profile->brand_name ?? ''); ?></strong>
                            <h1>הרשמה</h1>
                            <form method="POST" action="<?php echo e(route('brand-register')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for=""> שם מותג <span>*</span></label>
                                    <div class="inputIcon">
                                        <img src="<?php echo e(asset('assets_admin/img/user.svg')); ?>" alt="">
                                        <input class="form-control" type="text" value="<?php echo e($brand_profile->brand_name ?? ''); ?>" name="brand_name" id="brand_name" placeholder="הזן שם מותג" required>
                                    </div>
                                    <div style="color:red;"><?php echo e($errors->first('name')); ?></div> <br>
                                </div>
                                <div class="form-group">
                                    <label for="">אימייל <span>*</span></label>
                                    <div class="inputIcon">
                                        <img src="<?php echo e(asset('assets_admin/img/email.svg')); ?>" alt="">
                                        <input readonly class="form-control" type="email" id="email" value="<?php echo e(Auth::user()->email); ?>">
                                    </div>
                                    <div style="color:red;"><?php echo e($errors->first('email')); ?></div> <br>
                                </div>

                                <div class="form-group">
                                    <label for="" >  תמונת מותג  <span>*</span></label>
                                    <div class="inputIcon">
                                        <input class="form-control" type="file" name="brand_image" id="brand_image" value="<?php echo e($brand_profile->brand_image ?? ''); ?>">
                                    </div>
                                    <div style="color:red;"><?php echo e($errors->first('brand_image')); ?></div> <br>
                                </div>

                                <div class="form-group">
                                    <label for="" > לוגו מותג <span>*</span></label>
                                    <div class="inputIcon">
                                        <input class="form-control" type="file" name="brand_logo" id="brand_logo" value="<?php echo e($brand_profile->brand_logo ?? ''); ?>">
                                    </div>
                                    <div style="color:red;"><?php echo e($errors->first('brand_logo')); ?></div> <br>
                                </div>
                                
                                <div class="form-group"> 
                                    <label for=""> קטגוריה <span>* </span></label>
                                    <div class="inputIcon">
                                        <select required class="select" name="category_id" id="category-dropdown">
                                            <option selected disabled>Select Category</option>
                                            <?php if($brand_profile): ?>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>" <?php echo e($brand_profile->category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div style="color:red;"><?php echo e($errors->first('category_id')); ?></div> <br>
                                    </div>
                                </div>

                                <div class="form-group"> 
                                    <label for=""> קטגוריה <span>* </span></label>
                                    <div class="inputIcon">
                                        <select name="sub_category_id[]" class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE">
                                            <?php if($sub_categories): ?>
                                            <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sub_category->id); ?>" selected><?php echo e($sub_category->subcategory->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div style="color:red;"><?php echo e($errors->first('category_id')); ?></div> <br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>מספר הווצאפ של העסק שלך (אופציונלי)</label>
                                    <input class="form-control" type="number" name="whatsapp_no" value="<?php echo e(old('whatsapp_no')); ?>" id="whatsapp_no">
                                    <div style="color:red;"><?php echo e($errors->first('address')); ?></div> <br>
                                </div>

                                <h2>Brand Style</h2><br>
                                <div class="form-group"> 
                                    <label>בחר פונט לראש האתר</label>
                                    <select class="form-control" tabindex="-1" aria-hidden="true" name="header_font" id="header_font">
                                        <option selected disabled>Select Font Family</option>
                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                        <option value="Calibri (Body)">Calibri (Body)</option>
                                        <option value="Algerian" >Algerian</option>
                                        <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Bahnschrift">Bahnschrift</option>
                                        <option value="Blackadder ITC">Blackadder ITC</option>
                                        <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                        <option value="Castellar">Castellar</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Curlz MT">Curlz MT</option>
                                        <option value="Forte">Forte</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                        <option value="Bodoni MT Black">Bodoni MT Black</option>
                                        <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                    </select>
                                    <div style="color:red;"><?php echo e($errors->first('header_font')); ?></div> <br>
                                </div>
                                <div class="form-group">
                                    <label>צבע תחתית האתר</label>
                                    <input class="form-control" type="color" name="header_color" value="<?php echo e(old('header_color')); ?>" id="header_color">
                                    <div style="color:red;"><?php echo e($errors->first('footer_color')); ?></div> <br>
                                    
                                </div>

                                <div class="form-group"> 
                                    <label>בחר פונט לתחתית האתר</label>
                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="footer_font" id="footer_font">
                                        <option selected disabled>Select Font Family</option>
                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                        <option value="Calibri (Body)">Calibri (Body)</option>
                                        <option value="Algerian" >Algerian</option>
                                        <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Bahnschrift">Bahnschrift</option>
                                        <option value="Blackadder ITC">Blackadder ITC</option>
                                        <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                        <option value="Castellar">Castellar</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Curlz MT">Curlz MT</option>
                                        <option value="Forte">Forte</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                        <option value="Bodoni MT Black">Bodoni MT Black</option>
                                        <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                    </select>
                                    <div style="color:red;"><?php echo e($errors->first('footer_font')); ?></div> <br>
                                
                                </div>
                                <div class="form-group">
                                    <label>בחר פונט לתחתית האתר</label>
                                    <input class="form-control" type="color" name="footer_color" value="<?php echo e(old('footer_color')); ?>" id="footer_color">
                                    <div style="color:red;"><?php echo e($errors->first('footer_color')); ?></div> <br>
                                        
                                </div>

                                <div class="form-group"> 
                                    <label>בחר פונט לכפתורים באתר</label>
                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="button_font" id="button_font">
                                        <option selected disabled>Select Font Family</option>
                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                        <option value="Calibri (Body)">Calibri (Body)</option>
                                        <option value="Algerian" >Algerian</option>
                                        <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Bahnschrift">Bahnschrift</option>
                                        <option value="Blackadder ITC">Blackadder ITC</option>
                                        <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                        <option value="Castellar">Castellar</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Curlz MT">Curlz MT</option>
                                        <option value="Forte">Forte</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                        <option value="Bodoni MT Black">Bodoni MT Black</option>
                                        <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                              
                                    </select>
                                    <div style="color:red;"><?php echo e($errors->first('button_font')); ?></div><br>
                                </div>
                                <div class="form-group">
                                    <label>צבע הכפתורים באתר</label>
                                    <input class="form-control" type="color" name="button_color" value="<?php echo e(old('button_color')); ?>" id="button_color">
                                    <div style="color:red;"><?php echo e($errors->first('button_color')); ?></div> <br>
                                </div>
                                <div class="form-group"> 
                                    <label>בחר פונט לכותרות באתר</label>
                                    <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="title_font" id="title_font">
                                        <option selected disabled>Select Font Family</option>
                                        <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                        <option value="Calibri (Body)">Calibri (Body)</option>
                                        <option value="Algerian" >Algerian</option>
                                        <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Bahnschrift">Bahnschrift</option>
                                        <option value="Blackadder ITC">Blackadder ITC</option>
                                        <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                        <option value="Castellar">Castellar</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Curlz MT">Curlz MT</option>
                                        <option value="Forte">Forte</option>
                                        <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                        <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                        <option value="Bodoni MT Black">Bodoni MT Black</option>
                                        <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                    </select>
                                    <div style="color:red;"><?php echo e($errors->first('title_font')); ?></div> <br>
                                </div>
                                <div class="form-group">
                                    <label>צבע הכותרות באתר</label>
                                    <input class="form-control" type="color" name="title_color" value="<?php echo e(old('title_color')); ?>" id="title_color">
                                    <div style="color:red;"><?php echo e($errors->first('title_color')); ?></div> <br>
                                    
                                </div>
                                <div class="form-group"> 
                                    <label>בחר פונט לטקסטים הרגילים באתר</label>
                                        <select class="select select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="text_font" id="text_font">
                                            <option selected disabled>Select Font Family</option>
                                            <option value="Calibri Light (Headings)">Calibri Light (Headings)</option>
                                            <option value="Calibri (Body)">Calibri (Body)</option>
                                            <option value="Algerian" >Algerian</option>
                                            <option value="Gill Sans Ultra Bold">Gill Sans Ultra Bold</option>
                                            <option value="Times New Roman">Times New Roman</option>
                                            <option value="Gill Sans MT Condensed">Gill Sans MT Condensed</option>
                                            <option value="Arial">Arial</option>
                                            <option value="Bahnschrift">Bahnschrift</option>
                                            <option value="Blackadder ITC">Blackadder ITC</option>
                                            <option value="Bernard MT Condensed">Bernard MT Condensed</option>
                                            <option value="Castellar">Castellar</option>
                                            <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                            <option value="Curlz MT">Curlz MT</option>
                                            <option value="Forte">Forte</option>
                                            <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                            <option value="Bahnschrift SemiLight Condensed">Bahnschrift SemiLight Condensed</option>
                                            <option value="Bodoni MT Black">Bodoni MT Black</option>
                                            <option value="Copperplate Gothic Light" >Copperplate Gothic Light</option>
                                        </select>
                                        <div style="color:red;"><?php echo e($errors->first('text_font')); ?></div> <br>
                                    </div>
                                    <div class="form-group">
                                        <label>צבע הטקסטים הרגילים באתר</label>
                                        <input class="form-control" type="color" name="text_color" value="<?php echo e(old('text_color')); ?>" id="text_color">
                                        <div style="color:red;"><?php echo e($errors->first('text_color')); ?></div> <br>
                                        
                                    </div>






                                <table class="table table-bordered" id="dynamicTable">  
                                    <tr>
                                        <th>כתובת</th>
                                    </tr>
                                    <?php if($addresses): ?>
                                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <tr>
                                        
                                        <td>
                                            <div class="inputIcon">
                                                
                                                <textarea class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="הכנס כתובת" id="address" name="addmore[0]" rows="4" cols="50" ><?php echo e($address->address ?? ''); ?> </textarea>
                                                
                                                <div style="color:red;"><?php echo e($errors->first('addmore[0][address]')); ?></div> <br>
                                            </div>
                                        </td> 
                                        <?php if(($loop->first)): ?>
                                        <td><button type="button" name="add" id="add" class="btn btn-success add_remove">Add More</button></td> 
                                        <?php else: ?>
                                        <td>
                                            <button type="button" class="btn btn-danger remove-tr add_remove">Remove</button>
                                        </td>
                                        <?php endif; ?> 
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tr>
                                        
                                        <td>
                                            <div class="inputIcon">
                                                
                                                <textarea class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="הכנס כתובת" id="address" name="addmore[0]" rows="4" cols="50" ><?php echo e($address->address ?? ''); ?> </textarea>
                                                
                                                <div style="color:red;"><?php echo e($errors->first('addmore[0][address]')); ?></div> <br>
                                            </div>
                                        </td> 
                                        <td><button type="button" name="add" id="add" class="btn btn-success add_remove">Add More</button></td> 
                                    </tr>
                                    <?php endif; ?>   
                                </table> 

                                <div class="form-group">
                                    <label for=""> תיאור </label>
                                    <div class="inputIcon">
                                        <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=" הזן תיאור " id="description" name="description" rows="4" cols="50" ><?php echo e($brand_profile->description ?? ''); ?></textarea>
                                        <div style="color:red;"><?php echo e($errors->first('description')); ?></div> <br>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit"> ליצור מותג </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var i = 0;
       
       $("#add").click(function(){
       
           ++i;
       
           $("#dynamicTable").append('<tr><td><textarea type="text" name="addmore['+i+']" placeholder="הכנס כתובת" rows="4" cols="50" class="form-control" ></textarea></td><td><button type="button" class="btn btn-danger remove-tr add_remove">Remove</button></td></tr>');
       });
       
       $(document).on('click', '.remove-tr', function(){  
           $(this).parents('tr').remove();
       }); 
        $(document).ready(function() {
            // Select2 Multiple
            $('#select2MultipleE').select2({
                placeholder: "בחר תת-קטגוריה",
                allowClear: true
            });

            //change category adn show sub-category

            $('#category-dropdown').on('change', function () {
                var idCategory = this.value;
                // alert(idCategory);
                $("#select2MultipleE").html('');
                $.ajax({
                    url: "<?php echo e(url('/fetch-subcategory')); ?>",
                    type: "POST",
                    data: {
                        category_id: idCategory,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#select2MultipleE').html('<option value="">-- בחר תת-קטגוריה --</option>');
                        $.each(result.sub_categories, function (key, value) {
                            $("#select2MultipleE").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.brand_signup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dosize_new\resources\views/brand/brand_profile.blade.php ENDPATH**/ ?>