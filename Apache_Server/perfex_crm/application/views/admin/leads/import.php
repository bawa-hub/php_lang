<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if (!$this->import->isSimulation()) { ?>
                <div class="alert alert-info">
                    <?php echo $this->import->importGuidelinesInfoHtml(); ?>
                </div>
                <?php } ?>
                <h4 class="tw-font-semibold tw-text-lg tw-text-neutral-700 tw-flex tw-justify-between tw-items-center">
                    <?php echo _l('import_leads'); ?>
                    <?php echo $this->import->downloadSampleFormHtml(); ?>
                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo $this->import->maxInputVarsWarningHtml(); ?>

                        <?php if (!$this->import->isSimulation()) { ?>
                        <?php echo $this->import->createSampleTableHtml(); ?>
                        <?php } else { ?>
                        <div class="tw-mb-6">
                            <?php echo $this->import->simulationDataInfo(); ?>
                        </div>
                        <?php echo $this->import->createSampleTableHtml(true); ?>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo form_open_multipart($this->uri->uri_string(), ['id' => 'import_form']) ; ?>
                                <?php echo form_hidden('leads_import', 'true'); ?>
                                <?php echo render_input('file_csv', 'choose_csv_file', '', 'file'); ?>
                                <?php
                echo render_leads_status_select($statuses, ($this->input->post('status') ? $this->input->post('status') : get_option('leads_default_status')), 'lead_import_status', 'status', [], true);
                echo render_leads_source_select($sources, ($this->input->post('source') ? $this->input->post('source') : get_option('leads_default_source')), 'lead_import_source');
                ?>
                                <?php echo render_select('responsible', $members, ['staffid', ['firstname', 'lastname']], 'leads_import_assignee', $this->input->post('responsible')); ?>
                                <div class="form-group">
                                    <button type="button"
                                        class="btn btn-primary import btn-import-submit"><?php echo _l('import'); ?></button>
                                    <button type="button"
                                        class="btn btn-primary simulate btn-import-submit"><?php echo _l('simulate_import'); ?></button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
<script src="<?php echo base_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
<script>
$(function() {
    appValidateForm($('#import_form'), {
        file_csv: {
            required: true,
            extension: "csv"
        },
        source: 'required',
        status: 'required'
    });
});
</script>
</body>

</html>
