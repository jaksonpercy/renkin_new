<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengaturan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active">Pengaturan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-sm-3">

      <?php include 'sidebar.php'; ?>

    </div>
    <div class="col-sm-9">

      <!-- Default card -->
      <div class="card">

        <div class="card-header with-border">
          <h3 class="card-title"><?php echo lang('general_setings') ?></h3>
        </div>

        <?php echo form_open_multipart('settings/generalUpdate', [ 'class' => 'form-validate', 'autocomplete' => 'off', 'method' => 'post' ]); ?>
        <div class="card-body">

          <div class="form-group">
            <label for="formSetting-Company-Name">Suspend Entry</label>
            <select name="suspend_entry" class="form-control select2">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            </select>
          </div>


          <div class="form-group">
            <label for="formSetting-Language-Name">Periode Aktif</label>
            <select name="periode_aktif" class="form-control select2">
            <option value="Triwulan I">Triwulan I</option>
            <option value="Triwulan II">Triwulan II</option>
            <option value="Triwulan III">Triwulan III</option>
            <option value="Triwulan IV">Triwulan IV</option>
          </select>
        </div>

        <div class="form-group">
          <label for="formSetting-Company-Name">Periode Realisasi</label>
          <select name="periode_realisasi" class="form-control select2">
          <option value="Yes">Yes</option>
          <option value="No">No</option>
          </select>
        </div>

        <div class="form-group">
          <label for="formSetting-Company-Name">Periode Penilaian</label>
          <select name="periode_penilaian" class="form-control select2">
          <option value="Yes">Yes</option>
          <option value="No">No</option>
          </select>
        </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-flat btn-primary"><?php echo lang('submit') ?></button>
        </div>
        <!-- /.card-footer-->

        <?php echo form_close(); ?>

      </div>
      <!-- /.card -->

    </div>
  </div>

</section>
<!-- /.content -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Date & Date Time Formats</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">Supports <code>date</code> function available characters. For more info  <a href="https://www.php.net/manual/en/function.date.php">link</a></div>
        <ul>
            <li>d - The day of the month (from 01 to 31)</li>
            <li>D - A textual representation of a day (three letters)</li>
            <li>j - The day of the month without leading zeros (1 to 31)</li>
            <li>l (lowercase 'L') - A full textual representation of a day</li>
            <li>N - The ISO-8601 numeric representation of a day (1 for Monday, 7 for Sunday)</li>
            <li>S - The English ordinal suffix for the day of the month (2 characters st, nd, rd or th. Works well with j)</li>
            <li>w - A numeric representation of the day (0 for Sunday, 6 for Saturday)</li>
            <li>z - The day of the year (from 0 through 365)</li>
            <li>W - The ISO-8601 week number of year (weeks starting on Monday)</li>
            <li>F - A full textual representation of a month (January through December)</li>
            <li>m - A numeric representation of a month (from 01 to 12)</li>
            <li>M - A short textual representation of a month (three letters)</li>
            <li>n - A numeric representation of a month, without leading zeros (1 to 12)</li>
            <li>t - The number of days in the given month</li>
            <li>L - Whether it's a leap year (1 if it is a leap year, 0 otherwise)</li>
            <li>o - The ISO-8601 year number</li>
            <li>Y - A four digit representation of a year</li>
            <li>y - A two digit representation of a year</li>
            <li>a - Lowercase am or pm</li>
            <li>A - Uppercase AM or PM</li>
            <li>B - Swatch Internet time (000 to 999)</li>
            <li>g - 12-hour format of an hour (1 to 12)</li>
            <li>G - 24-hour format of an hour (0 to 23)</li>
            <li>h - 12-hour format of an hour (01 to 12)</li>
            <li>H - 24-hour format of an hour (00 to 23)</li>
            <li>i - Minutes with leading zeros (00 to 59)</li>
            <li>s - Seconds, with leading zeros (00 to 59)</li>
            <li>u - Microseconds (added in PHP 5.2.2)</li>
            <li>e - The timezone identifier (Examples: UTC, GMT, Atlantic/Azores)</li>
            <li>I (capital i) - Whether the date is in daylights savings time (1 if Daylight Savings Time, 0 otherwise)</li>
            <li>O - Difference to Greenwich time (GMT) in hours (Example: +0100)</li>
            <li>P - Difference to Greenwich time (GMT) in hours:minutes (added in  PHP 5.1.3)</li>
            <li>T - Timezone abbreviations (Examples: EST, MDT)</li>
            <li>Z - Timezone offset in seconds. The offset for timezones west of UTC is negative (-43200 to  50400)</li>
            <li>c - The ISO-8601 date (e.g. 2013-05-05T16:34:42+00:00)</li>
            <li>r - The RFC 2822 formatted date (e.g. Fri, 12 Apr 2013 12:01:05 +0200)</li>
            <li>U - The seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)</li>
         </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    $('.form-validate').validate();

      //Initialize Select2 Elements
    $('.select2').select2()



var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html, {size: 'small'});
});

  })

  function previewImage(input, previewDom) {

    if (input.files && input.files[0]) {

      $(previewDom).show();

      var reader = new FileReader();

      reader.onload = function(e) {
        $(previewDom).find('img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }else{
      $(previewDom).hide();
    }

  }

  function recaptchKeysHideShow(checked) {

    if(!checked)
      $('.recaptchKeysHideShow').hide(300);
    else
      $('.recaptchKeysHideShow').show(300);

  }

  recaptchKeysHideShow(<?php echo setting('google_recaptcha_enabled') ?>);
</script>

<?php include viewPath('includes/footer'); ?>
