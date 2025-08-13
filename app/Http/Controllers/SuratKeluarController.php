<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\Bidang;
use App\Models\KodeSurat;
use App\Models\JenisSurat;
use App\Models\Jabatan;
use App\Models\SuratKeluarUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Novay\WordTemplate\WordTemplate;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\IOFactory;
use PDF;
use TCPDF;
use Dompdf\Dompdf;
use setasign\Fpdi\Tcpdf\Fpdi;
use LSNepomuceno\LaravelA1PdfSign\Sign\{ManageCert, SignaturePdf};

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // $a = class_exists('ZipArchive');
        // dd($a);
        // Load the RTF template
        // $templateProcessor = new TemplateProcessor(storage_path('app/templates/template.docx'));

        // // Variables to replace in the template
        // $data = [
        //     'name' => 'rifaldi',
        //     'email' => 'rifaldi@email.com',
        // ];

        // // Replace variables in the template
        // foreach ($data as $key => $value) {
        //     $templateProcessor->setValue($key, $value);
        // }

        // // Save the modified RTF file
        // $outputFilePath = storage_path('app/generated-documents/document.rtf');
        // $templateProcessor->saveAs($outputFilePath);

        // // Return a download response

        // $certificate = 'file://'.base_path().'/storage/app/certificates/certificates.crt';
        // $info = array(
        //     'Name' => 'Politani Samarinda',
        //     'Location' => 'Indonesia',
        //     'Reason' => 'Generate Letter PDF',
        //     'ContactInfo' => 'info@politanisamarinda.ac.id',
        // );
        // PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);
        // PDF::SetFont('helvetica', '', 12);
        // PDF::SetCreator('Politani Samarinda');
        // PDF::SetTitle('new-pdf');
        // PDF::SetAuthor('Politani');
        // PDF::SetSubject('Generated PDF');
        // PDF::AddPage();
        // $html = '<div>
        //     <h1>What is Lorem Ipsum?</h1>
        //     Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        //     Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s,
        //     when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        //     It has survived not only five centuries, but also the leap into electronic typesetting, 
        //     remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
        //     sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like 
        //     Aldus PageMaker including versions of Lorem Ipsum.
        // </div>';
        // PDF::writeHTML($html, true, false, true, false, '');
        // PDF::Output(public_path('digital-signed-pdfaa.pdf'), 'F');
        // PDF::reset();
        // echo "PDF Generated Successfully";

        // Get the authenticated user's information
        // $user = Auth::user();
        // $jabatan = $user->jabatanActive->Jabatan;
        // // $headerImage = storage_path('app/public/kop_file/' . $jabatan->kop_file);
        // $headerImage = storage_path('app/public/kop_file/1111_kop_LY3.png');

        // $request = null;

        // // Define initial data to pass to the Blade template
        // $data = [
        //     'header_image' => $headerImage,
        //     'nomor' => '323/PL21/PP/2024',
        //     'lampiran' => '', // We'll set this after generating the PDF to get the total pages
        //     'hal' => 'Hal',
        //     'recipient' => 'recipient',
        //     'body_content' => 'isi',
        //     'nama_pejabat' => 'Default Nama Pejabat',
        //     'nip' => 'Default NIP',
        //     'tembusan' => 'Default Tembusan',
        // ];

        // // Render the Blade view to HTML
        // $htmlContent = view('template_surat.surat_dinas', $data)->render();

        // dd($htmlContent);

        // Create a new TCPDF instance
        // $pdf = new TCPDF();

        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);

        // $pdf->SetFont('times', '', 11);

        // // Set margins to zero
        // // $pdf->SetMargins(0, 0, 0);
        // $pdf->SetHeaderMargin(0);
        // $pdf->SetFooterMargin(0);

        // $pdf->AddPage();

        // $pdf->Image($headerImage, 0, 0, $pdf->getPageWidth(), '', '', '', '', false, 300, '', false, false, 0);

        // // Set margins if needed
        // // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        // // Write the HTML content to the PDF
        // $pdf->writeHTML($htmlContent, true, false, true, false, '');
        

        // // Calculate total pages
        // $totalPages = $pdf->getAliasNbPages();

        // // Update the 'lampiran' value
        // $data['lampiran'] = $totalPages;

        // // Re-render the Blade view with the updated 'lampiran' value
        // $htmlContent = view('template_surat.surat_dinas', $data)->render();

        // // Clear the previous content and add the updated content
        // $pdf->deletePage(1);
        // $pdf->AddPage();
        // $pdf->writeHTML($htmlContent, true, false, true, false, '');

        // // Output the PDF as a download
        // // return ($htmlContent);
        // return $pdf->Output('document.pdf', 'I'); // 'I' for inline, 'D' for download

        // Step 1: Generate PDF using DOMPDF
        // $dompdf = new Dompdf();
        // // $html = View::make('pdf-template')->render();
        // $dompdf->loadHtml($htmlContent);
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();
        // $output = $dompdf->output();
        // $filePath = storage_path('app/public/pdf_with_contentadsa.pdf');
        // file_put_contents($filePath, $output);

        // // Sign the PDF using TCPDF
        // // $tcpdf = new TCPDF();
        // // $tcpdf = new setasign\Fpdi\Tcpdf\Fpdi();
        // $tcpdf = new Fpdi();
        // $tcpdf->setSourceFile($filePath);

        // $certificate = 'file://'.base_path().'/storage/app/certificates/certificates.crt';
        // $info = array(
        //     'Name' => 'Politani Samarinda',
        //     'Location' => 'Indonesia',
        //     'Reason' => 'Generate Letter PDF',
        //     'ContactInfo' => 'info@politanisamarinda.ac.id',
        // );

        // // $tcpdf->setSignature('path/to/your/certificate.pem', 'path/to/your/private.key', 'your_private_key_password', '', 1);
        // $tcpdf->setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);
        // $signature = $tcpdf->addSignature();
        
        // // Stream the signed PDF to the user
        // return response()->file($filePath, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="signed_document.pdf"',
        // ]);

        // try {
        //     $cert = new ManageCert;
        //     $cert->fromPfx(storage_path('app/certificates/certificate.pfx'), 'samarinda123');
        //     dd($cert->getCert());
        // } catch (\Throwable $th) {
        //     dd($th);
        //     // TODO necessary
        // }

        // try {
        //     $pdf = new SignaturePdf(storage_path('app/public/pdf_with_contentadsa.pdf'), $cert, SignaturePdf::MODE_DOWNLOAD);
        //     return $pdf->signature(); // The file will be downloaded
        // } catch (\Throwable $th) {
        //     // TODO necessary
        //     // dd($th);
        // }

        $kode_surats = KodeSurat::withTrashed()->orderBy('id','DESC')->get();

        // dd(Auth::user()->jabatanActive->Jabatan);

        return view('surat_keluar.index', compact('kode_surats'));
    }
    public function create($id)
    {
        $kode_surat = KodeSurat::find($id);
        $jenis_surats = JenisSurat::all();
        $jabatans = Jabatan::whereHas('jabatanActive')->get();

        return view('surat_keluar.create', compact('kode_surat', 'jenis_surats', 'jabatans'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        // ]);

        // dd($request->all());

        // $wordTemplate = new WordTemplate();

        // $file = storage_path('app/public/template_surat/surat_dinas.rtf');

        
        // $array = array(
        //     '[KODE]' => $request->kode_surat,
        //     '[LAMPIRAN]' => 'Lampiran',
        //     '[HAL]' => 'hal',
        //     '[TANGGAL]' => $request->tanggal,
        //     '[CONTENT]' => $request->isi,
        //     '[NAMAJABATAN]' => 'jabatan',
        //     '[CAPDINAS]' => 'capdinas',
        //     '[NAMAPEJABAT]' => Auth::user()->name,
        //     '[NIP]' => Auth::user()->nip ?? 'TIDAK ADA NIP',
        // );

        // $nama_file = 'surat-dinas.rtf';

        // return $wordTemplate->export($file, $array, $nama_file);

        $kode_surat_id = KodeSurat::where('kode_surat', $request->kode_surat)->first();
        // dd($request);

        if ($request->template == '0') {
            if ($request->hasFile('file')) {
                // Get the uploaded file
                // dd($request);
                $uploadedFile = $request->file('file');
        
                // Generate the file name
                $kode_surat = str_replace('/', '_', $request->kode_surat);
                $fileName = $kode_surat . '_' . str_replace('-', '_', $request->tanggal) . '.' . $uploadedFile->getClientOriginalExtension();
        
                // Move the uploaded file to the storage directory
                $uploadedFile->move(storage_path('app/public/surat_keluar/'), $fileName);
        
                // Create the SuratKeluar record
                $surat_keluar = SuratKeluar::create([
                    'perihal' => $request->hal,
                    'tanggal' => $request->tanggal,
                    'tujuan' => $request->tujuan,
                    'file_name' => $fileName,
                    'sifat_surat' => $request->sifat_surat,
                    'jenis_surat_id' => $request->jenis_surat_id,
                    'kode_surat_id' => $kode_surat_id->id,
                    'created_by' => Auth::user()->id,
                ]);

                $surat_keluar_user_pt = SuratKeluarUsers::create([
                    'surat_keluar_id' => $surat_keluar->id,
                    'users_jabatan_id' => $request->jabatan_id,
                    'status_baca' => 'belum-dilihat',
                    'status_penanda_tangan' => '1',
                ]);
            }
        }else{

            $jabatan_penanda_tangan = Jabatan::where('id', $request->jabatan_id)->first();
            // dd($jabatan_penanda_tangan->jabatanActive->user);
            // Load the template file into PhpWord
            $phpWord = IOFactory::load(storage_path('app/public/template_surat/surat_dinas.docx'));

            // Get the first section of the document
            $section = $phpWord->getSections()[0];

            // Create a header and add an image to it
            $header = $section->addHeader();
            $header->addImage(
                storage_path('app/public/kop_file/'. Auth::user()->jabatanActive->Jabatan->kop_file),
                array(
                    'width' => 595, 
                    'height' => 72, 
                    'positioning' => 'absolute',
                    'posHorizontal' => 'left',
                    'posHorizontalRel' => 'page',
                    'posVertical' => 'top',
                    'posVerticalRel' => 'page',
                    'marginLeft' => 0,
                    'marginTop' => 0,
                    'wrappingStyle' => 'inline', 
                    'asHeader' => true 
                )
            );

            // Save the modified PhpWord object to a new file
            $outputFilePath = storage_path('app/public/surat_keluar/temp_with_header.docx');
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($outputFilePath);

            // Load the modified file with TemplateProcessor to fill in placeholders
            $templateProcessor = new TemplateProcessor($outputFilePath);

            $data = [
                'kode' => $request->kode_surat,
                'lampiran' => $request->lampiran ?? 'Tidak ada',
                'hal' => $request->perihal,
                'tanggal' => $request->tanggal,
                'isi' => $request->isi,
                'jabatan' => 'Direktur',
                'nama_pejabat' => $jabatan_penanda_tangan->jabatanActive->user->name,
                'nip' => $jabatan_penanda_tangan->jabatanActive->user->nip,
            ];

            // dd($data);

            // Set text placeholders values
            foreach ($data as $key => $value) {
                $templateProcessor->setValue($key, $value);
            }

            $kode_surat = str_replace('/', '_', $request->kode_surat);
            $fileName = $kode_surat . '_' . str_replace('-', '_', $request->tanggal) . '.docx';
            $finalOutputFilePath = storage_path('app/public/surat_keluar/' . $fileName);

            // Save the final document
            $templateProcessor->saveAs($finalOutputFilePath);

            // Store document info in the database
            $surat_keluar = SuratKeluar::create([
                'perihal' => $request->hal,
                'tanggal' => $request->tanggal,
                'tujuan' => $request->tujuan,
                'file_name' => $fileName,
                'sifat_surat' => $request->sifat_surat,
                'jenis_surat_id' => $request->jenis_surat_id,
                'kode_surat_id' => $kode_surat_id->id,
                'created_by' => Auth::user()->id,
            ]);
        }

        

        // Return a download response
        // return response()->download($outputFilePath, 'document.rtf');

        
        // return WordTemplate::export($file, $array, $nama_file);

        // SuratKeluar::create($request->all());

        return redirect()->route('surat_keluar.index')->with('success', 'Surat Keluar created successfully.');
    }

    public function edit(Bidang $bidang)
    {
        return view('bidang.edit', compact('bidang'));
    }

    public function update(Request $request, Bidang $bidang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $bidang->update($request->all());

        return redirect()->route('bidang.index')->with('success', 'Bidang updated successfully.');
    }

    public function show(SuratKeluar $surat_keluar)
    {
        // Assuming you want to pass the surat_keluar object to a view
        // dd($surat_keluar->SuratKeluarUsers);
        $surat_keluar_users = SuratKeluarUsers::where('surat_keluar_id', $surat_keluar->id)->get();
        // dd($surat_keluar->id);
        return view('surat_keluar.show', compact('surat_keluar'));
    }

    public function destroy(Bidang $bidang)
    {
        $bidang->delete();

        return redirect()->route('bidang.index')->with('success', 'Bidang deleted successfully.');
    }

    public function downloadSurat($fileName)
    {
        $filePath = storage_path('app/public/surat_keluar/' . $fileName);
        
        return Response::download($filePath);
    }

    public function perbarui_status(Request $request)
    {
        // dd($request->status == 'terima' ? 'sudah-disetujui' : 'tolak');

        // Find the SuratKeluarUser by ID and update the status_baca
        $suratKeluarUser = SuratKeluarUsers::find($request->id);
        $suratKeluarUser->status_baca = $request->status == 'terima' ? 'sudah-disetujui' : 'tolak';
        $suratKeluarUser->save();

        // Return a response or redirect as needed
        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
