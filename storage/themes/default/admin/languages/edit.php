<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo route('admin') ?>"><?php ee('Dashboard') ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo route('admin.languages') ?>"><?php ee('Languages') ?></a></li>
  </ol>
</nav>

<h1 class="h3 mb-5"><?php ee('Update Translation') ?></h1>
<div class="row">
    <div class="col-md-4">
        <div class="card card-body shadow-sm">
            <p><strong><?php ee('Summary') ?></strong></p>
            <p><?php ee('Translated {a} of {b} strings.', null, ['a' => count(array_filter($data['data'])), 'b' => count($data['data'])]) ?></p>

            <p><strong><?php ee('Filter') ?></strong></p>
            <p>
                <a href="#" data-trigger="filterlanguage" data-type="all" class="btn btn-outline-dark rounded btn-sm active"><?php ee('All') ?></a>
                <a href="#" data-trigger="filterlanguage" data-type="translated" class="btn btn-outline-dark rounded btn-sm"><?php ee('Translated') ?></a>
                <a href="#" data-trigger="filterlanguage" data-type="untranslated" class="btn btn-outline-dark rounded btn-sm"><?php ee('Untranslated') ?></a>
            </p>
        </div>
    </div>
    <div class="col-md-8">
        <div class="alert bg-dark text-white p-2"><?php ee('You can use Google Translate to translate strings by clicking on Auto but it is not guaranteed as Google can block the request if it detects an abuse. You should not use this feature too quickly.') ?></div>
        <div class="alert bg-warning p-2"><?php ee('We highly recommend you to save the form at each 10-15 mins in order to prevent data loss.') ?></div>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <form method="post" action="<?php echo route('admin.languages.update', [$data['code']]) ?>">            
            <?php echo csrf() ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="name" class="form-label fw-bold"><?php ee('Name') ?></label>
                        <input type="text" class="form-control p-2" name="name" id="name" value="<?php echo $data['name'] ?>" placeholder="E.g. French">
                        <p class="form-text"><?php ee('The name of the language you are translating.') ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="code" class="form-label fw-bold"><?php ee('Code') ?></label>
                        <input type="text" class="form-control p-2" name="code" id="code" value="<?php echo $data['code'] ?>" placeholder="E.g. fr" disabled>
                        <p class="form-text"><?php ee('If you leave this empty, we will use the first two letters of the name. To use the auto-translate feature, the code must be added first and should be ISO 639-1 <a href="https://www.loc.gov/standards/iso639-2/php/code_list.php" target="_blank">more info</a>.') ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="code" class="form-label fw-bold"><?php ee('Direction') ?></label>                        
                        <select name="rtl" id="rtl" class="form-select p-2">
                            <option value="0" <?php echo !$data['rtl'] ? 'selected':'' ?>><?php ee('LTR') ?></option>
                            <option value="1" <?php echo $data['rtl'] ? 'selected':'' ?>><?php ee('RTL') ?></option>
                        </select>
                        <p class="form-text"><?php ee('Is this language RTL?') ?></p>
                    </div>
                </div>
            </div>            
            <hr>
            <div class="row">
                <?php $i = 0; foreach($data['data'] as $base => $string): ?>
                    <div class="col-md-4 strings <?php echo empty($string) ? 'is-empty' : '' ?>">
                        <div class="form-group mb-4 position-relative">
                            <a href="#" class="btn btn-sm btn-success text-sm position-absolute top-0 end-0 translate-middle" data-url="<?php echo route('admin.translate') ?>" data-trigger="translate" data-string="<?php echo htmlentities($base) ?>"><?php ee("Auto") ?></a>
                            <textarea class="form-control mb-1 p-2" readonly="readonly"><?php echo $base ?></textarea>
                            <textarea class="form-control p-2" data-new name="string[<?php echo base64_encode($base) ?>]"><?php echo $string ?></textarea>
                        </div>
                    </div>
                    <?php $i++; if($i % 3 == 0) echo '</div><div class="row">' ?>
                <?php endforeach ?>
            </div>
            <hr>
            <h5 class="card-title fw-bold"><?php ee('Add a custom string') ?></h5>
            <div class="form-group mb-4 position-relative">                
                <div class="row">
                    <div class="col-md-6">
                        <label for="string" class="form-label fw-bold"><?php ee('String') ?></label>
                        <textarea class="form-control mb-1 p-2" id="string" name="newbase[]"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="translated" class="form-label fw-bold"><?php ee('Translated String') ?></label>
                        <textarea class="form-control mb-1 p-2" id="translated" name="newstring[]"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><?php ee('Update') ?></button>
        </form>
    </div>
</div>