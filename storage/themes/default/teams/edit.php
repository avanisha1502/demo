<h1 class="h3 mb-5 fw-bold"><?php ee('Edit Member') ?></h1>
<div class="card shadow-sm">
    <div class="card-body">
        <form method="post" action="<?php echo route('team.update', [$team->id]) ?>">
            <?php echo csrf() ?>
            <div class="form-group mb-3">
                <label for="email" class="label-control mb-2"><?php echo e("Email") ?></label>
                <input type="email" class="form-control" value="<?php echo $team->user->email ?>" disabled>				
            </div>	
            <div class="form-group input-select mb-3">
                <label for="permissions" class="label-control mb-2"><?php echo e("Permissions") ?></label>
                <select name="permissions[]" class="form-control" placeholder="<?php echo e("Permissions") ?>" data-placeholder="<?php echo e("Permissions") ?>" multiple data-toggle="select">	
                    <optgroup label="<?php echo e("Links") ?>">
                        <option value="links.create" <?php echo in_array('links.create', $team->permission) ? 'selected': '' ?>><?php echo e("Create Links") ?></option>
                        <option value="links.edit" <?php echo in_array('links.edit', $team->permission) ? 'selected': '' ?>><?php echo e("Edit Links") ?></option>
                        <option value="links.delete" <?php echo in_array('links.delete', $team->permission) ? 'selected': '' ?>><?php echo e("Delete Links") ?></option>				    				
                    </optgroup>
                    <?php if (user()->has("qr") !== false): ?>
                        <optgroup label="<?php echo e("QR Codes") ?>">
                            <option value="qr.create" <?php echo in_array('qr.create', $team->permission) ? 'selected': '' ?>><?php echo e("Create QR") ?></option>
                            <option value="qr.edit" <?php echo in_array('qr.edit', $team->permission) ? 'selected': '' ?>><?php echo e("Edit QR") ?></option>
                            <option value="qr.delete" <?php echo in_array('qr.delete', $team->permission) ? 'selected': '' ?>><?php echo e("Delete QR") ?></option>				    				
                        </optgroup>
                    <?php endif ?>
                    <?php if (user()->has("bio") !== false): ?>
                        <optgroup label="<?php echo e("Bio Pages") ?>">
                            <option value="bio.create" <?php echo in_array('bio.create', $team->permission) ? 'selected': '' ?>><?php echo e("Create Bio") ?></option>
                            <option value="bio.edit" <?php echo in_array('bio.edit', $team->permission) ? 'selected': '' ?>><?php echo e("Edit Bio") ?></option>
                            <option value="bio.delete" <?php echo in_array('bio.delete', $team->permission) ? 'selected': '' ?>><?php echo e("Delete Bio") ?></option>				    				
                        </optgroup>
                    <?php endif ?>
                    <?php if (user()->has("splash") !== false): ?>
                        <optgroup label="<?php echo e("Custom Splash") ?>">
                            <option value="splash.create" <?php echo in_array('splash.create', $team->permission) ? 'selected': '' ?>><?php echo e("Create Splash") ?></option>
                            <option value="splash.edit" <?php echo in_array('splash.edit', $team->permission) ? 'selected': '' ?>><?php echo e("Edit Splash") ?></option>
                            <option value="splash.delete" <?php echo in_array('splash.delete', $team->permission) ? 'selected': '' ?>><?php echo e("Delete Splash") ?></option>				    				
                        </optgroup>
                    <?php endif ?>
                    <?php if (user()->has("overlay") !== false): ?>
                        <optgroup label="<?php echo e("CTA Overlay") ?>">
                            <option value="overlay.create" <?php echo in_array('overlay.create', $team->permission) ? 'selected': '' ?>><?php echo e("Create Overlay") ?></option>
                            <option value="overlay.edit" <?php echo in_array('overlay.edit', $team->permission) ? 'selected': '' ?>><?php echo e("Edit Overlay") ?></option>
                            <option value="overlay.delete" <?php echo in_array('overlay.delete', $team->permission) ? 'selected': '' ?>><?php echo e("Delete Overlay") ?></option>				    				
                        </optgroup>
                    <?php endif ?>	
                    <?php if (user()->has("pixels") !== false): ?>
                            <optgroup label="<?php echo e("Tracking Pixels") ?>">
                            <option value="pixels.create" <?php echo in_array('pixels.create', $team->permission) ? 'selected': '' ?>><?php echo e("Create Pixels") ?></option>
                            <option value="pixels.edit" <?php echo in_array('pixels.edit', $team->permission) ? 'selected': '' ?>><?php echo e("Edit Pixels") ?></option>
                            <option value="pixels.delete" <?php echo in_array('pixels.delete', $team->permission) ? 'selected': '' ?>><?php echo e("Delete Pixels") ?></option>				    				
                        </optgroup>
                    <?php endif ?>
                    <?php if (user()->has("domain") !== false): ?>
                            <optgroup label="<?php echo e("Branded Domains") ?>">
                            <option value="domain.create" <?php echo in_array('domain.create', $team->permission) ? 'selected': '' ?>><?php echo e("Add Branded Domain") ?></option>
                            <option value="domain.delete" <?php echo in_array('domain.delete', $team->permission) ? 'selected': '' ?>><?php echo e("Delete Branded Domain") ?></option>				    				
                        </optgroup>
                    <?php endif ?>								    				
                    <?php if (user()->has("bundle") !== false): ?>
                            <optgroup label="<?php echo e("Campaigns") ?>/<?php ee('Channels') ?>">
                            <option value="bundle.create" <?php echo in_array('bundle.create', $team->permission) ? 'selected': '' ?>><?php echo e("Create Campaigns") ?>/<?php ee('Channels') ?></option>
                            <option value="bundle.edit" <?php echo in_array('bundle.edit', $team->permission) ? 'selected': '' ?>><?php echo e("Edit Campaigns") ?>/<?php ee('Channels') ?></option>
                            <option value="bundle.delete" <?php echo in_array('bundle.delete', $team->permission) ? 'selected': '' ?>><?php echo e("Delete Campaigns") ?>/<?php ee('Channels') ?></option>				    				
                        </optgroup>
                    <?php endif ?>	
                    <?php if (user()->has("api") !== false): ?>
                        <option value="api.create" <?php echo in_array('api.create', $team->permission) ? 'selected': '' ?>><?php echo e("Developer API") ?></option>		    				
                    <?php endif ?>	
                    <?php if (user()->has("export") !== false): ?>
                        <option value="export.create" <?php echo in_array('export.create', $team->permission) ? 'selected': '' ?>><?php echo e("Export Data") ?></option>		    				
                    <?php endif ?>						    						    						    					    							    		
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary"><?php ee('Update') ?></button>
        </form>
    </div>
</div>