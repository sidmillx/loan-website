<?php 
  $pageTitle = 'Loan Application';
  include './includes/member_header.php'; 
?>

<section class="loan-application main">
    <h2 class="main-header">Loan</h2>
    <div class="container-loan">
        <div class="loan-form-container">

            <div class="page-header">
                <h2>Apply for a Loan</h2>
                <h5> Apply for long-duration loans suited for significant investments with flexible repayment plans.</h5>
            </div>
            
            <!-- Loan Type Selection -->
            <div class="loan-type">
                <button class="loan-btn active" onclick="showForm('soft-loan')">Soft Loan</button>
                <button class="loan-btn" onclick="showForm('emergency-loan')">Emergency Loan</button>
                <button class="loan-btn" onclick="showForm('long-term-loan')">Long-Term Loan</button>
            </div>

                

                
            <form id="soft-loan" class="loan-form">
                <label>P/b No:</label>
                <input type="text" name="pb_no">
                
                <label>Savings Balance:</label>
                <input type="text" name="savings_bal">
                
                <label>Loan Balance:</label>
                <input type="text" name="loan_bal">
                
                <label>Name:</label>
                <input type="text" name="name">
                
                <label>ID No:</label>
                <input type="text" name="id_no">
                
                <label>Postal Address:</label>
                <input type="text" name="postal_address">
                
                <label>Contact Numbers:</label>
                <input type="text" name="work" placeholder="Work">
                <input type="text" name="cell" placeholder="Cell">
                <input type="text" name="home" placeholder="Home">
                
                <label>Number of Dependents:</label>
                <input type="text" name="dependents">
                
                <label>Gross Salary (E):</label>
                <input type="text" name="gross_salary">
                
                <label>Net Salary (E):</label>
                <input type="text" name="net_salary">
                
                <label>Loan Amount (E):</label>
                <input type="text" name="loan_amount">
                
                <label>Loan Period (months):</label>
                <input type="text" name="loan_period">
                
                <label>Installment Due Date:</label>
                <input type="date" name="installment_date">
                
                <label>Installment Amount:</label>
                <input type="text" name="installment_amount">
                
                <label>Purpose of Loan:</label>
                <textarea name="purpose"></textarea>
                
                <p class="section-title">Loan Agreement</p>
                <p>I hereby certify that all the information given above is true and complete. I promise to abide by the terms of this agreement.</p>
                <label>Signature of Borrower:</label>
                <input type="text" name="borrower_signature">
                
                <label>Date:</label>
                <input type="date" name="borrower_date">
                
                <!-- CREDIT COMMITEE INFORMATIONS -->
                <!-- <p class="section-title">For Credit Committee Use</p>
                <label>Loan Approved:</label>
                <input type="text" name="loan_approved">
                
                <label>Conditions:</label>
                <textarea name="conditions"></textarea>
                
                <label>Loan Rejected (Reasons):</label>
                <textarea name="rejected_reasons"></textarea>
                
                <label>Chairperson Signature:</label>
                <input type="text" name="chairperson_signature">
                
                <label>Date:</label>
                <input type="date" name="chairperson_date">
                
                <label>Secretary Signature:</label>
                <input type="text" name="secretary_signature">
                
                <label>Date:</label>
                <input type="date" name="secretary_date">
                
                <label>CC Member Signature:</label>
                <input type="text" name="cc_signature">
                
                <label>Date:</label>
                <input type="date" name="cc_date">
                
                <p class="section-title">For Office Use Only</p>
                <label>CPV No:</label>
                <input type="text" name="cpv_no">
                
                <label>Cheque No:</label>
                <input type="text" name="cheque_no">
                
                <label>Processed By (Name):</label>
                <input type="text" name="processed_by">
                
                <label>Signature:</label>
                <input type="text" name="processed_signature">
                
                <label>Date:</label>
                <input type="date" name="processed_date"> -->
                <p>For the credit of loan (Details below)</p>
                <label>Name of Bank:</label>
                <input type="text" name="name_of_bank">

                <label>Branch:</label>
                <input type="text" name="branch">

                <label>Name of Bank:</label>
                <input type="account_number" name="account_number">

                
                <button type="submit">Submit Application</button>

            </form>


            <!-- EMERGENCY LOAN NEW INFORMATION -->
            <form id="emergency-loan" class="loan-form hidden">
                <!-- Personal Information Section -->
                <fieldset>
                    <legend>Personal Information</legend>
                    <label>P/o No_Savings Bal: <input type="text" name="savings_bal"></label>
                    <label>Loan Bal: <input type="text" name="loan_bal"></label>
                    <label>Name: <input type="text" name="full_name" required></label>
                    <label>ID No: <input type="text" name="id_number" required></label>
                    <label>Postal Address: <textarea name="address"></textarea></label>
                </fieldset>
            
                <!-- Contact Information -->
                <fieldset>
                    <legend>Contact Information</legend>
                    <label>Work Phone: <input type="tel" name="work_phone"></label>
                    <label>Cell Phone: <input type="tel" name="cell_phone" required></label>
                    <label>Home Phone: <input type="tel" name="home_phone"></label>
                    <label>Number of dependents: <input type="number" name="dependents"></label>
                </fieldset>
            
                <!-- Salary Information -->
                <fieldset>
                    <legend>Income Details</legend>
                    <label>Gross salary (E) per month: <input type="number" name="gross_salary"></label>
                    <label>Net salary per month: <input type="number" name="net_salary"></label>
                </fieldset>
            
                <!-- Loan Details -->
                <fieldset>
                    <legend>Loan Request</legend>
                    <label>Loan Amount (E): <input type="number" name="loan_amount" required></label>
                    <label>Loan Period (months): <input type="number" name="loan_period" required></label>
                    <label>Installment Due Date: <input type="date" name="due_date"></label>
                    <label>Purpose of loan: <textarea name="loan_purpose" required></textarea></label>
                </fieldset>
            
                <!-- Agreement Section -->
                <fieldset>
                    <legend>Agreement</legend>
                    <label>
                        <input type="checkbox" required> I certify that all information is true and agree to the terms
                    </label>
                    <label>Signature: <input type="text" name="signature" required></label>
                    <label>Date: <input type="date" name="signature_date" required></label>
                </fieldset>
            
                <!-- Bank Details -->
                <fieldset>
                    <legend>Bank Information</legend>
                    <label>Bank Name: <input type="text" name="bank_name"></label>
                    <label>Branch: <input type="text" name="branch"></label>
                    <label>Account Number: <input type="text" name="account_number"></label>
                </fieldset>
            
                <!-- Credit Committee Section -->
                <fieldset>
                    <legend>Credit Committee Approval</legend>
                    <label>
                        <input type="radio" name="approval" value="approved"> Approved as submitted
                    </label>
                    <label>
                        <input type="radio" name="approval" value="conditional"> Approved with conditions:
                        <textarea name="conditions"></textarea>
                    </label>
                    <label>
                        <input type="radio" name="approval" value="rejected"> Rejected:
                        <textarea name="rejection_reason"></textarea>
                    </label>
                    
                    <div class="signatures">
                        <label>Chairperson Signature: <input type="text" name="chair_sign"></label>
                        <label>Date: <input type="date" name="chair_date"></label>
                        <label>Secretary Signature: <input type="text" name="sec_sign"></label>
                        <label>Date: <input type="date" name="sec_date"></label>
                    </div>
                </fieldset>
            
                <!-- Office Use -->
                <fieldset>
                    <legend>Office Use Only</legend>
                    <label>CPV No: <input type="text" name="cpv"></label>
                    <label>Cheque No: <input type="text" name="cheque"></label>
                    <label>Processed By: <input type="text" name="processor"></label>
                    <label>Signature: <input type="text" name="processor_sign"></label>
                    <label>Date: <input type="date" name="process_date"></label>
                </fieldset>

                <button type="submit" class="submit-btn">Apply Now</button>

            </form>



                 <!-- LONG TERM LOAN APPLICATION  -->

            <form id="long-term-loan" class="loan-form hidden">
                <!-- Loan Header -->
                <fieldset>
                    <legend>Loan Application Header</legend>
                    <label>P/b No: <input type="text" name="pb_number"></label>
                    <label>Savings Balance: <input type="number" name="savings_bal"></label>
                    <label>Loan Balance: <input type="number" name="loan_bal"></label>
                </fieldset>
        
                <!-- Personal Details -->
                <fieldset>
                    <legend>Personal Particulars</legend>
                    <label>Full Name: <input type="text" name="full_name" required></label>
                    <label>ID Number: <input type="text" name="id_number" required></label>
                    <label>Postal Address: <textarea name="postal_address"></textarea></label>
                    <label>Residential Address: <textarea name="residential_address"></textarea></label>
                    <label>Contact Numbers - Work: <input type="tel" name="work_phone"></label>
                    <label>Cell: <input type="tel" name="cell_phone" required></label>
                    <label>Home: <input type="tel" name="home_phone"></label>
                    <label>Employer: <input type="text" name="employer"></label>
                    <label>Number of Dependents: <input type="number" name="dependents"></label>
                </fieldset>
        
                <!-- Income Details -->
                <fieldset>
                    <legend>Income Information</legend>
                    <label>Gross Salary (E): <input type="number" name="gross_salary"></label>
                    <label>Net Salary: <input type="number" name="net_salary"></label>
                    <label>Other Income: <input type="number" name="other_income"></label>
                    <label>Source of Other Income: <input type="text" name="income_source"></label>
                </fieldset>
        
                <!-- Loan Request -->
                <fieldset>
                    <legend>Loan Details</legend>
                    <label>Loan Amount (E): <input type="number" name="loan_amount" required></label>
                    <label>Loan Period: <input type="text" name="loan_period" placeholder="month/years" required></label>
                    <label>Existing Loan Installment: <input type="number" name="existing_loan"></label>
                    <label>Monthly Repayment Amount: <input type="number" name="repayment_amount"></label>
                    <label>Installment Due Date: <input type="date" name="due_date"></label>
                    <label>Purpose of Loan: <textarea name="loan_purpose" required></textarea></label>
                    <label>Surity/Co-maker: <input type="text" name="surity_name"></label>
                    <label>Surity Value (E): <input type="number" name="surity_value"></label>
                </fieldset>
        
                <!-- Existing Loans -->
                <fieldset>
                    <legend>Existing Loans</legend>
                    <label>
                        Existing loans elsewhere? 
                        <select name="existing_loans">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </label>
                    <label>If yes, details: <textarea name="loan_details"></textarea></label>
                </fieldset>
        
                <!-- Agreement Section -->
                <fieldset>
                    <legend>Loan Agreement & Deduction Authority</legend>
                    <label>
                        <input type="checkbox" required> I certify all information is true and authorize salary/savings deductions
                    </label>
                    <label>Signature: <input type="text" name="signature" required></label>
                    <label>Date: <input type="date" name="signature_date" required></label>
                </fieldset>
        
                <!-- Bank Details -->
                <fieldset>
                    <legend>Bank Information</legend>
                    <label>Bank Name: <input type="text" name="bank_name"></label>
                    <label>Branch: <input type="text" name="branch"></label>
                    <label>Account Number: <input type="text" name="account_number"></label>
                </fieldset>

                <button type="submit" class="submit-btn">Apply Now</button>

            </form>

                <!-- END OF LONG TERM LOAN -->

        </div>

            
    </div>
</section>

<?php include './includes/member_footer.php'; ?>
