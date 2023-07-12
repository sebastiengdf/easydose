'''
Created on 27 mars 2019

@author: sebastien
'''
import configparser
import logging
import pydicom
from ManageDCMData import ManageDCMData
from pynetdicom import AE, VerificationPresentationContexts,StoragePresentationContexts, evt
from pydicom.uid import ImplicitVRLittleEndian,ExplicitVRLittleEndian
from pynetdicom.sop_class import CTImageStorage, MRImageStorage, XRayRadiationDoseSRStorage,BreastTomosynthesisImageStorage 

class EasydoseSCPServer(object):
    '''
    classdocs
    '''


    def __init__(self):
        '''
        Constructor
 
        '''
        self.cfg = configparser.ConfigParser()
        self.cfg.read('/home/dicomserver/Config/easydose.cfg')
        logging.basicConfig(filename=self.cfg.get('LOG', 'fileName'), level=logging.DEBUG, format='%(asctime)s %(message)s')
        logging.warning('Initialisation classe: %s', 'EasydoseSCPServer')
        
        self.loggin=logging

    def handle_echo(self,event):
        """Handle a C-ECHO request event."""
        print("negociation")
        return 0x0000
 
    def on_c_store(self,event):
        #try:
            print("test")
            ds = event.dataset
            print("test2")
            manageDCMData = ManageDCMData(ds,self.loggin,self.cfg)
            manageDCMData.insertInformation()
            print("ok")
            return 0x0000
        #except:
        #    return 0xC000 
   
    def start(self):
        import pydicom,numpy
        
        ae = AE(ae_title=self.cfg.get('SCP', 'aet'))
        # Or we can use the inbuilt VerificationPresentationContexts list,
        #   there's one for each of the supported Service Classes
        # In this case, we are supporting any requests to use Verification SOP
        #   Class in the association
        #ae.supported_contexts = VerificationPresentationContexts
        
        
        # Add presentation contexts with specified transfer syntaxes
        for context in StoragePresentationContexts:
            ae.add_supported_context(context.abstract_syntax, transfer_syntax=ExplicitVRLittleEndian)
        for context in VerificationPresentationContexts:
            ae.add_supported_context(context.abstract_syntax, transfer_syntax=ExplicitVRLittleEndian)
        ae.add_supported_context(XRayRadiationDoseSRStorage, transfer_syntax=ExplicitVRLittleEndian)
        ae.add_supported_context(BreastTomosynthesisImageStorage, transfer_syntax=ExplicitVRLittleEndian)
        # ae.on_c_store=self.on_c_store
        # Start the SCP on (host, port) in blocking mode
        handlers = [(evt.EVT_C_ECHO, self.handle_echo),(evt.EVT_C_STORE, self.on_c_store)]
        ae.start_server((self.cfg.get('SCP', 'hostname'), int(self.cfg.get('SCP', 'port'))),evt_handlers=handlers)
    
